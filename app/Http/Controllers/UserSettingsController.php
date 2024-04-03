<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\Telegram;
use App\Classes\WorkerFunction;
use App\Models\BindingUser;
use App\Models\Coin;
use App\Models\Domain;
use App\Models\kyc_application;
use App\Models\Mentor;
use App\Models\SessionUser;
use App\Models\TechSupport;
use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use Cassandra\Exception\ValidationException;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserSettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user['kyc_step_text'] = "Unverified";
        $CF = new CoinFunction();
        $domain = Domain::getDomain();
        $WF = new WorkerFunction();
        $sum_deposit = $CF->getTotalDepositUser($user->id);
        $worker = $WF->getWorker($user->id);
        $min_deposit = 100;
        if ($worker) {
            $min_deposit = $worker->min_deposit_for_withdraw;
        }
        if ($user->kyc_step == 1 && $min_deposit <= $sum_deposit) {
            $user['kyc_step_text'] = "Verified";
        }
        if ($user->premium) {
            $user['kyc_step_text'] = "Premium";
        }

        $kyc = kyc_application::where("user_id", $user->id)->first();
        $ga_qrCode = null;
        if (env("APP_ENV") == "production") {
            $ga = new GoogleAuthenticator();
            $ga_qrCode = $ga->getUrl($user->email, $_SERVER['HTTP_HOST'], $user['secret_2fa']);
        }
        $sessions = SessionUser::where("user_id", $user->id)->get();
        $withdrawAvailability = $WF->withdrawAvailability();
        return view("account", ["user" => $user, "kyc" => $kyc, "qr_ga" => $ga_qrCode, "sessions" => $sessions, "withdrawAvailability" => $withdrawAvailability, "domain" => $domain]);
    }

    public function changePassword(Request $request): \Illuminate\Http\JsonResponse
    {


        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'current_password' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return response()->json(['errors' => ["current_password" => ["Current password is incorrect"]]], 401);
        }
        if (Hash::check($request->current_password, Auth::user()->password)) {
            return response()->json(['errors' => ["current_password" => ["The password cannot be the same"]]], 401);
        }
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully'], 201);


    }


    public function createKycApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "sex" => "required",
            "first_name" => "required|string",
            "last_name" => "required|string",
            "phone" => "required|numeric",
            "dateOfBrith" => "required|date",
            "country" => "required",
            "city" => "required",
            "address" => "required|string|max:255",
            "zip_code" => "required|numeric|max:999999",
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $worker_id = BindingUser::where("user_id_mamont", $request->user()->id)->first()->toArray();

        $date = Carbon::parse($request->dateOfBrith);
        $KycApp = new kyc_application();
        $KycApp->sex = $request->sex;
        $KycApp->user_id = $request->user()->id;
        if ($worker_id) {
            $KycApp->worker_id = $worker_id['user_id_worker'];
        }
        $KycApp->first_name = $request->first_name;
        $KycApp->last_name = $request->last_name;
        $KycApp->phone = $request->phone;
        $KycApp->country = $request->country;
        $KycApp->city = $request->city;
        $KycApp->address = $request->address;
        $KycApp->zip_code = $request->zip_code;
        $KycApp->data_of_birth = $date->format("Y-m-d");

        $KycApp->save();

        $WF = new WorkerFunction();
        $worker = $WF->getWorkerAcc($request->user()->id);
        if($worker && $worker['isNotification'] && $worker['isNewTicket'] && $worker['telegram_chat_id'] && $worker['id'] != $request->user()->id){
            $telegram = new Telegram();
            $user = $request->user();
            $telegram->sendMessage( $worker['telegram_chat_id'], "🦣 Новая заявка на верификацию от $user->email!",);

        }
        return response()->json(['message' => 'Application created successfully'], 201);

    }

    public function settingsAdmin()
    {
        $templates = Template::where("user_id", Auth::user()->id)
            ->orWhere("user_id", null)->get()->toArray();
        $user = Auth::user();
        $coins = Coin::all();
        $coinsPayment = Coin::where("payment_active", 1)->get()->toArray();
        $domains = Domain::where("user_id", Auth::user()->id)->get()->toArray();
        $mentors = Mentor::all();
        foreach ($mentors as $key => $mentor) {
            $mentors[$key]['user'] = User::where("id", $mentor->user_id)->first();
        }
        $tech_support = TechSupport::all();
        foreach ($tech_support as $key => $support) {
            $tech_support[$key]['user'] = User::where("id", $support->id)->first();
        }
        return view("admin.settings", ["templates" => $templates, "domains" => $domains, "coins" => $coins, "coinsPayment" => $coinsPayment, "mentors" => $mentors, "tech_support" => $tech_support, "user" => $user]);
    }

    public function enable2FA(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $ga = new GoogleAuthenticator();
        $secret = $request->user()->secret_2fa;
        $checkResult = $ga->checkCode($secret, $request->code);
        if (!$checkResult) {
            return response()->json(['errors' => ["code" => ["Code is incorrect"]]], 401);
        }
        $user = $request->user();
        $user->is_2fa = true;
        $user->save();
        return response()->json(['message' => '2FA enabled successfully'], 201);
    }

    public function disable2FA()
    {
        $user = Auth::user();
        $user->is_2fa = false;
        $user->save();
        return response()->json(['message' => '2FA disabled successfully'], 201);
    }

    public function deleteSession(Request $request)
    {
        $session = SessionUser::where("id", $request->session_id)->where("user_id", $request->user()->id)->first();
        if ($session) {
            $session->delete();
            return response()->json(['message' => 'Session disconnected successfully'], 201);
        }

    }
}
