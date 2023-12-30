<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Token;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function index(){
        return view('login');
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',


        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return response()->json(['message' => 'User logged in successfully'], 201);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 200);
        }
    }
    public function resetPasswordEmail(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $user = User::where("email", $request->email)->first();
        if ($user){
            $domain = $request->getHost();
            $domain = Domain::where("domain", $domain)->first();
            if ($domain) {
            $token = password_hash($request->email.time(), PASSWORD_DEFAULT);
            $Token = new Token();
            $Token->type = "password_reset";
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

            $phpmailer->setFrom($domain['stmp_email'], 'Reset password');
            $phpmailer->addAddress($request->email, 'Recipient Name');

            $phpmailer->Subject = 'House crypto project';

            $phpmailer->Body = view('email.reset-password', ['token' => $token])->render();
            $phpmailer->send();
            }
            return response()->json(['message' => 'We have sent a link to change password to your email'], 201);
        }
        return response()->json(['message' => 'User not found'], 200);
    }
    public function resetPassword($token){
        $Token = Token::where("token", $token)->first();
        if ($Token){
            $user = User::where("id", $Token->user_id)->first();
            if ($user){
                return view("auth.change-password", ['token' => $token]);
            }
        }
        return redirect(route("login"));
    }
    public function changePassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $Token = Token::where("token", $request->token)->first();
        if ($Token){
            $user = User::where("id", $Token->user_id)->first();
            if ($user){
                $user->password = bcrypt($request->password);
                $user->save();
                $Token->delete();
                return response()->json(['message' => 'Password changed successfully'], 201);
            }
        }
        return response()->json(['message' => 'User not found'], 200);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
