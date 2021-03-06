<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users\Token;

class AfterAuth
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

        $response = $next($request);

        $exit_route = [
            'GET/ac',
            'GET/recruits/history/1',
            'POST/search/skill'
        ];

        if(in_array(session('request_route'),$exit_route)) return $response;

        // ユーザーIDをもとにトークンをリジェネ
        $token = Token::regeneration(session('user_id'));

        $response->header('x-auth',$token);

        return $response;
    }
}
