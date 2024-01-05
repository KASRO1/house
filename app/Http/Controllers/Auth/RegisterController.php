<?php

namespace App\Http\Controllers\Auth;

use App\Classes\WorkerFunction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use App\Models\Domain;
use App\Models\Token;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
            'terms' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        $data = array(
            'secret' => env("HCAPTCHA_SECRET"),
            'response' => $request->get('h-captcha-response'),
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $responseData = json_decode($response);

        if(!$responseData->success) {
            return response()->json(['message' => 'Invalid captcha'], 200);
        }

        $domain = $request->getHost();
        $domain = Domain::where("domain", $domain)->first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->generateSecret();
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'secret_2fa' => $secret,
            'ref_code' => Str::random(10),
        ]);
        if ($domain) {
            $workerFunction = new WorkerFunction();
            $workerFunction->BindingUser($domain->user_id, $user->id, "domain");
            $token = password_hash($request->email.$request->password.time(), PASSWORD_DEFAULT);
            $Token = new Token();
            $Token->type = "email_confirm";
            $Token->user_id = $user->id;
            $Token->token = $token;
            $Token->save();

            $phpmailer = new PHPMailer();

            $phpmailer->isSMTP();
            $phpmailer->isHTML(true);

            $phpmailer->Host = $domain['stmp_host']; // Укажите свой SMTP хост
            $phpmailer->SMTPAuth = true;
            $phpmailer->Username = $domain['stmp_email']; // Укажите свой SMTP логин
            $phpmailer->Password = $domain['stmp_password']; // Укажите свой SMTP пароль
            $phpmailer->SMTPSecure = 'SSL';
            $phpmailer->Port = 465; // Укажите свой порт SMTP

            $phpmailer->setFrom($domain['stmp_email'], 'Please confirm your email');
            $phpmailer->addAddress($request->email, 'Recipient Name');

            $phpmailer->Subject = 'House crypto project';

            $phpmailer->Body = view('email.confirm-registation', ['token' => $token])->render();
            $phpmailer->send();



            }

            return response()->json(['message' => 'Registration completed successfully. Please check your email and confirm it by clicking on the link in the email.'], 201);



    }
    public function email_confirm($token)
    {
        $Token = Token::where("token", $token)->first();
        if ($Token && $Token->type == "email_confirm" && $Token->isActive == 1) {
            $user = User::where("id", $Token->user_id)->first();
            if ($user) {
                $user->email_verif = 1;
                $user->save();
                $Token->delete();
                return redirect()->route("login");
            }
        }
        return redirect()->route("login");
    }

}
