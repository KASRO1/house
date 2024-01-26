<?php

namespace App\Http\Middleware;

use App\Models\BindingUser;
use App\Models\kyc_application;
use App\Models\News;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class HeaderData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if(!$user){
            return $next($request);
        }
        $news = News::where('id', '!=', '0')->orderBy("id","desc")->limit(5)->get()->toArray();
        foreach ($news as $key => $value) {
            $news[$key]['time'] = $this->timeElapsedString($value['created_at']);
        }
        $users = BindingUser::where("user_id_worker", $user->id)->orderBy("id", "desc")->limit(5)->get()->toArray();
        foreach ($users as $key => $value) {
            $users[$key]['user'] = User::where("id", $value['user_id_mamont'])->first()->toArray();
            $users[$key]['user']['time'] = $this->timeElapsedString($users[$key]['user']['last_online']);
        }

        $tickets = Ticket::where("worker_id", $request->user()->id)->where("status", "open")->where("messageIsRead", false)->get()->toArray();
        $newMessage = count($tickets) > 0;
        View::share('UsersNotify', $users);
        View::share('NewsNotify', $news);
        View::share('NewMessage', $newMessage);

        return $next($request);
    }
    public function timeElapsedString($date) {
        $carbonDate = Carbon::parse($date);
        $now = Carbon::now();
        $diff = $now->diffForHumans($carbonDate);

        return $diff;
    }
}
