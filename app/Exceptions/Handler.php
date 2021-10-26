<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

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
        // $this->reportable(function (Throwable $e) {
        //     //
        // });
        
        $this->renderable(function (\Exception $e, $request) {
            return $this->handleException($e, $request);
        });
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Here you can return your own response or work with request                
        $prefix = request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3);     
        if($request->expectsJson() && $prefix === 'api/v1/staff') {
            return response()->json([
                'status' => __('messages.error'),
                'description' => __('messages.unauthorized'),
                'errors' => [
                    'code' =>  5003,
                    'message' =>  __('messages.credentials_invalid')
                ]
            ], 401);
        }
        
        // This is the default
        return $request->expectsJson()
            ? response()->json([
                'status' => __('messages.error'),
                'description' => __('messages.unauthorized'),
                'errors' => [
                    'code' =>  5003,
                    'message' =>  __('messages.credentials_invalid')
                ]
            ], 401)
            : abort(401, 'Unauthorize.');
    }

    private function handleException($e, $request)
    {                    
        if( $request->expectsJson() ) {
            if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ||
            $e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
                return response()->json([                
                    'status' => __('messages.error'),
                    'description' => __('messages.not_found'),                    
                ],404);
            }

            $prefix = request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3);              
            if($prefix === 'api/v1/staff') {
            //     if ($e instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            //         return response()->json([
            //             'status' => __('messages.error'),
            //             'description' => __('messages.unauthorized'),
            //             'errors' => [
            //                 'code' => 5045,
            //                 'message' => __('messages.permissions_insufficient'),
            //             ]
            //         ], 403);
            //     }
            }
        }    
        
        if($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return abort(404);
        }
    }
}
