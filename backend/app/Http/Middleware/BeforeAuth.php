<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users\Token;
use Prophecy\Argument\Token\InArrayToken;

use function PHPUnit\Framework\returnValue;

class BeforeAuth
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

        $route = $request->method().explode("/api",$request->url())[1];
        session(['request_route'=>$route]);

        // トークンで認証しないルート
        $exit_route = [
            'POST/users',
            'GET/ac',
            'GET/recruits'
        ];

        // exit_routeに登録されたルートであればスルー
        if(in_array($route,$exit_route)) return $next($request);
        // 認可に失敗したら401エラーでレスポンス
        if(Token::authorization($request)) return response()->json('',Response::HTTP_UNAUTHORIZED);

        session([ 'user_id' => explode("|",$request->headers->get('X-Auth'))[0] ]);

        return $next($request);
    }
}
