<?php

namespace App\Http\Middleware;

use App\Models\LogUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->user()) {
                LogUser::create([
                    "user_id" => Auth::id(),
                    "url" => $request->fullUrl()
                ]);
            }
            return route('login');
        }
    }

}
