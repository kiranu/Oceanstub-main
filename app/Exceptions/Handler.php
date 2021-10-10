<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Auth;
use Exception;
use Request;
use Response;
use Illuminate\Support\Arr;
use Illuminate\Session\TokenMismatchException;
class Handler extends ExceptionHandler
{
     
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //    return $request->expectsJson()
    //            ? response()->json(['message' => 'Unauthenticated.'], 401)
    //            : redirect()->guest(route('seller.dashboard'));
    
    // }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('seller') || $request->is('seller/*')) {
            return redirect()->guest('/seller');
        }
       
        return redirect()->guest(route('login'));
    }
/*public function render($request, Exception $e)
{
    if ($e instanceof ModelNotFoundException) {
        $e = new NotFoundHttpException($e->getMessage(), $e);
    }

    if ($e instanceof TokenMismatchException) {

        return redirect(route('seller.login'))->with('message', 'You page session expired. Please try again');
    }

    return parent::render($request, $e);
}*/
/*public function render($request, Exception $exception){
    if ($exception instanceof AuthenticationException) {
        return redirect(route('seller.login'));
    }
    return parent::render($request, $exception);
}*/


}
