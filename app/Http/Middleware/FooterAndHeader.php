<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use App\Models\Ticket;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class FooterAndHeader
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
        $domain = $request->getHost();
        $domain = Domain::where("domain", $domain)->first();
        $ticket = null;
        if(Auth::check()){
            $ticket = Ticket::where("user_id", auth()->user()->id)->where("status", "open")->first();
        }
//        if (!$request->secure() && App::environment() === 'production') {
//            return redirect()->secure($request->getRequestUri());
//        }

        View::share('ticket', $ticket);
        View::share('Domain', $domain);
        return $next($request);
    }
}
