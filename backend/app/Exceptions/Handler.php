<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (HttpException $e,$request){
            if($request->is('api/*')){
                $result='';
                $status='';

                switch($e->getCode()){
                    case 400:
                        $result=__('Bad Request');
                        break;
                    case 401:
                        $result=__('Unauthorized');
                        break;
                    case 403:
                        $result=__('Forbidden');
                        break;
                    case 404:
                        $result=__('Not Found');
                        break;
                    case 500:
                        $result=__('Server Error');
                        break;
                    case 503:
                        $result=__('Service Unavailable');
                        break;
                    default:
                        return;
                }
                $response=[
                    'result' =>$result,
                    'status' =>$e->getStatusCode()
                ];
                return response()->json($response['result'],$response['status']);
            }
        });
    }
}
