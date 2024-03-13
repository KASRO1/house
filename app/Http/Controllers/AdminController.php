<?php

namespace App\Http\Controllers;

use App\Classes\WorkerFunction;
use App\Models\ApiToken;
use App\Models\BindingUser;
use App\Models\kyc_application;
use App\Models\Message;
use App\Models\News;
use App\Models\Ticket;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Domain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $Mamonts['data'] = BindingUser::where("user_id_worker", auth()->user()->id)->orderBy("id", "DESC")->get()->toArray();
        $MamontsIsVerif = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.kyc_step", ">", 0)
            ->get()
            ->toArray();

        $MamontsIsVerifLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.kyc_step", ">", 0)
            ->whereMonth("binding_users.created_at", 11)
            ->get()
            ->toArray();

        $MamontsIsDeposit = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("transactions", "binding_users.user_id_mamont", "=", "transactions.user_id")
            ->where("transactions.Type", "=", "deposit")
            ->where("transactions.Status", "=", "1")
            ->get()
            ->toArray();

        $MamontsIsDepositLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("transactions", "binding_users.user_id_mamont", "=", "transactions.user_id")
            ->where("transactions.Type", "=", "deposit")
            ->where("transactions.Status", "=", "1")
            ->whereMonth("transactions.created_at", 11)
            ->get()
            ->toArray();

        $MamontsIsBlocked = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.users_status", "=", "blocked")
            ->get()
            ->toArray();

        $MamontsIsBlockedLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.users_status", "=", "blocked")
            ->whereMonth("binding_users.created_at", 11)
            ->get()
            ->toArray();

        $lastMonthUsers = BindingUser::where("user_id_worker", auth()->user()->id)
            ->whereMonth("created_at", 11)
            ->get()
            ->toArray();


        $Mamonts['statistic']['total_mamont']['labels'] = [];
        foreach ($Mamonts['data'] as $key => $mamont) {
            $mamontProfileInfo = \App\Models\User::where("id", $mamont['user_id_mamont'])->first()->toArray();

            $mamontProfileInfo['status_online'] = true;
            if($mamontProfileInfo['last_online'] < now()->subMinutes(5)){
                $mamontProfileInfo['status_online'] = false;
            }

            if($mamont['type'] === "promo"){
                $Mamonts['data'][$key]['type'] = "Промокод";
            }
            elseif($mamont['type'] === "manually"){
                $Mamonts['data'][$key]['type'] = "Ручная привязка";
            }
            elseif($mamont['type'] === "domain"){
                $Mamonts['data'][$key]['type'] = "Домен";
            }
            $shortName = substr($mamontProfileInfo['email'], 0, 4);

            $shortNameWithDots = $shortName . '...';

            $Mamonts['data'][$key]['mamontProfileInfo'] = $mamontProfileInfo;
            $date = new Carbon($mamont['created_at']);
            $date = $date->format('d M');
            $Mamonts['statistic']['total_mamont']['labels'][] = '"' . $date . '"';
            $Mamonts['statistic']['total_mamont']['data'][] = 1;


        }

        if(count($Mamonts['statistic']['total_mamont']['labels']) > 0 && count($Mamonts['statistic']['total_mamont']['data']) > 0){
            $Mamonts['statistic']['total_mamont']['labels'] = join(", ", $Mamonts['statistic']['total_mamont']['labels']);
            $Mamonts['statistic']['total_mamont']['data'] = join(", ", $Mamonts['statistic']['total_mamont']['data']);

            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['Total'] = $this->calculatePercentage($Mamonts['data'], $lastMonthUsers);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['isVerification'] = $this->calculatePercentage($MamontsIsVerifLastMonth, $MamontsIsVerif);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['deposit'] = $this->calculatePercentage($MamontsIsDepositLastMonth, $MamontsIsDeposit);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['isBlocked'] = $this->calculatePercentage($MamontsIsBlockedLastMonth, $MamontsIsBlocked);

            $Mamonts['statistic']['total_mamont']['lastMonth']['Total'] = count($lastMonthUsers);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isVerification'] = count($MamontsIsVerifLastMonth);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isDeposit'] = count($MamontsIsDepositLastMonth);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isBlocked'] = count($MamontsIsBlockedLastMonth);

            $Mamonts['statistic']['total_mamont']['Total'] = count($Mamonts['data']) ;
            $Mamonts['statistic']['total_mamont']['isVerification'] = count($MamontsIsVerif);
            $Mamonts['statistic']['total_mamont']['isDeposit'] = count($MamontsIsDeposit);
            $Mamonts['statistic']['total_mamont']['isBlocked'] = count($MamontsIsBlocked);

        }
        else{
            $Mamonts['statistic']['total_mamont']['labels'] = "[]";
            $Mamonts['statistic']['total_mamont']['data'] = "[]";
        }


        return view("admin.index", ["mamonts" => $Mamonts]);
    }

    protected function calculatePercentage($current, $lastMonth)
    {
        $currentCount = count($current);
        $lastMonthCount = count($lastMonth);

        // Избегаем деления на 0
        if ($lastMonthCount == 0) {
            return $currentCount == 0 ? 0 : 100;
        }

        return $currentCount / $lastMonthCount * 100;
    }

    public function viewWorkers(){
        $workers = User::where("users_status", "worker")->get()->toArray();
        $profits_sum = Transaction::where("type", "profit")->sum("amount");
        return view("admin.workers", ["workers" => $workers]);
    }
    public function viewKyc(){
        if(auth()->user()->users_status == "worker"){
            $kyc = kyc_application::where("worker_id", auth()->user()->id)->orderBy("created_at", "desc")->get()->toArray();
        }
        elseif(auth()->user()->users_status == "admin"){
            $kyc = kyc_application::orderBy("created_at", "desc")->get()->toArray();
        }


        return view("admin.kyc", ["kycs" => $kyc]);
    }
    public function viewTickects(){
        $tickets = Ticket::where("worker_id", Auth::user()->id)->orderBy("id", "DESC")->get()->toArray();
        foreach ($tickets as $key => $ticket){
            $tickets[$key]['user'] = User::where("id", $ticket['user_id'])->first()->toArray()['email'];
        }
        return view("admin.tickets", ["tickets" => $tickets]);
    }
    public function viewTickect($ticket_id){
        $ticket = Ticket::where("worker_id", Auth::user()->id)->where("id", $ticket_id)->first()->toArray();
        if(!$ticket && Auth::user()->users_status != "admin"){
            return redirect()->back();
        }
        $messages = Message::where("ticket_id", $ticket_id)->get()->toArray();
        $user = User::where("id", $ticket['user_id'])->first()->toArray();
        return view("admin.chat", ["ticket" => $ticket, "message" => $messages, "user" => $user]);
    }
    public function viewKycID(Request $request){
        if ($request->user()->users_status == "worker") {
            $kyc = kyc_application::where("id", $request->id)->where("worker_id", $request->user()->id)->first()->toArray();
        } elseif ($request->user()->users_status == "admin") {
            $kyc = kyc_application::where("id", $request->id)->first()->toArray();
        }
        if($kyc){
            return response()->json(["kyc" => $kyc]);
        }
        else {
            return response()->json(["message" => "Not found"], 404);
        }
    }
    public function acceptKycApp(Request $request){
        if($request->user()->users_status == "worker"){
            $kyc = kyc_application::where("id", $request->id)->where("worker_id", $request->user()->id)->first();
        }
        elseif($request->user()->users_status == "admin"){
            $kyc = kyc_application::where("id", $request->id)->first();
        }
        else{
            return response()->json(["message" => "Not found"], 404);
        }
        $kyc->status = "1";
        $kyc->save();
        $user = User::where("id", $kyc->user_id)->first();
        $user->kyc_step = "1";
        $user->save();
        return response()->json(["message" => "Accepted"], 200);
    }
    public function rejectKycApp(Request $request){
        if($request->user()->users_status == "worker"){
            $kyc = kyc_application::where("id", $request->id)->where("worker_id", $request->user()->id)->first();
        }
        elseif($request->user()->users_status == "admin"){
            $kyc = kyc_application::where("id", $request->id)->first();
        }
        else{
            return response()->json(["message" => "Not found"], 404);
        }
        $kyc->status = "-1";
        $kyc->save();
        return response()->json(["message" => "Rejected"], 200);
    }
    public function viewOrders(){
        if(auth()->user()->users_status == "worker"){
        $mamonts = BindingUser::where("user_id_worker", auth()->user()->id)->get()->toArray();
        $orders = [];

        foreach($mamonts as $mamont){
            $transaction = Transaction::where("user_id", $mamont['user_id_mamont'])->where("type", "deposit")->orderBy("created_at", "desc")->get()->toArray();
            if($transaction){
                $orders[] = $transaction;
            }

        }
        }
        elseif(auth()->user()->users_status == "admin"){
            $orders = Transaction::where("type", "deposit")->orderBy("created_at", "desc")->get()->toArray();

        }
        if(!$orders){
            $orders[] = [];
        }
//        dd($orders);
        return view("admin.orders", ["orders" => $orders]);
    }

    public function viewNews(){
        $news = News::all();
        return view("admin.news", ['News' => $news]);
    }

    public function createNews(Request $request){
        $request->validate([
            "title" => "required",
            "text" => "required",
            "logo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $image = $request->file('logo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/news/logos'), $imageName);
        $relativePath = 'images/news/logos/' . $imageName;

        $news = new News();
        $news->title = $request->title;
        $news->text = $request->text;
        $news->logo = $relativePath;
        $news->save();
        return response()->json(["message" => "Новость успешно добавлена"], 201);
    }
    public function deleteNews($id){
        $news = News::where("id", $id)->first();
        if($news){
            $news->delete();

        }
        return redirect()->back();
    }

    public function getWorker(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        if($request->token != env("API_TOKEN")){
            return response()->json(["message" => "Not found"], 404);
        }

        $user = User::where("email", $request->email)->first();
        if(!$user){
            return response()->json(["message" => "Not found"], 404);
        }
        $user->users_status = "worker";
        $user->save();

        return response()->json(["message" => "Success"], 200);
    }


    public function giveWorker(Request $request){
        $validator = Validator::make($request->all(), [
            "email" => "required|exists:users,email",
        ]);
        if($validator->fails()){
            return response()->json(["errors" => $validator->errors()], 401);
        }

        if($request->user()->users_status != "admin"){
            return response()->json(["message" => "Not found"], 404);
        }

        $user = User::where("email", $request->email)->first();
        $user->users_status = "worker";
        $user->save();

        return response()->json(['message'=> "Админка успешно выдана"]);

    }

    public function ApiKeys()
    {
        $api_tokens = ApiToken::all();
        $users = User::where("users_status", "worker")->get()->toArray();
        foreach ($api_tokens as $key => $token){
            $worker_id = $token['worker_id'];
            $api_tokens[$key]['worker_id'] = User::where("id", $worker_id)->first();
        }

        return view("admin.api_tokens", ["ApiTokens" => $api_tokens, "Users" => $users]);
    }

    public function ApiCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "api_key" => "required|unique:api_tokens,api_token",
            "worker_id" => "required|exists:users,id",
            "name" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $api_token = new ApiToken();
        $api_token->api_token = $request->api_key;
        $api_token->worker_id = $request->worker_id;
        $api_token->name = $request->name;
        $api_token->save();
        return response()->json(['message' => 'Api key created successfully'], 201);
    }
    public function ApiDelete($id)
    {
        $api = ApiToken::where("id", $id)->first();
        if($api){
            $api->delete();
        }
        return redirect()->back();
    }

    public function giftSave(Request $request){
        $coin = $request->coin;
        $amount = $request->amount;
        $text = $request->text_error;
        $domain = $request->getHost();
        $user = $request->user();
        $domain = Domain::where("domain", $domain)->where("user_id", $user->id)->first();
        if(!$domain){
            return response()->json(["message" => "Not found"], 404);
        }
        $domain->isGift = 1;
        $domain->amountGift = $amount;
        $domain->coinGift = $coin;
        $domain->text_gift = $text;
        $domain->save();

        return redirect()->back();
    }

}
?>



