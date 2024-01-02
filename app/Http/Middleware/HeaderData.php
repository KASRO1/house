<?php

namespace App\Http\Middleware;

use App\Models\News;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
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
        $news = News::where('id', '!=', '0')->orderBy("id","desc")->limit(5)->get()->toArray();
        foreach ($news as $key => $value) {
            $news[$key]['time'] = $this->timeElapsedString($value['created_at']);
        }

        View::share('NewsNotify', $news);
        return $next($request);
    }
    private function timeElapsedString($date) {
        $carbonDate = Carbon::parse($date);
        $now = Carbon::now();
        $diff = $now->diffForHumans($carbonDate);

        return $diff;
    }
}
