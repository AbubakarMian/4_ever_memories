<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Libraries\APIResponse;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
    public function render($request, Throwable $exception)
    {
        // return parent::render($request, $exception);

        if (str_contains($request->url(), 'localhost/')) {
            return parent::render($request, $exception);
        }
        Log::error('Exception Handler', [
            $exception->getMessage()
        ]);

        if (str_contains($request->url(), '/api/')) {
            return response()->json([
                'status' => 500,
                'response' => null,
                'error' => $exception->getMessage()
            ]);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('error.error_404', [], 404);
        }

        if ($exception instanceof TokenMismatchException) {
            if (str_contains($request->url(), '/admin/')) {
                return redirect('admin/login')->with('error','Try again.');            
            }
            else{
                return redirect('/')->with('error','Try again.');            
            }
        }
                // General exception handling - redirect based on URL
        if (str_contains($request->url(), '/admin/')) {
            return redirect('admin/login')->with('error', 'An error occurred. Please login again.');            
        } else {
            return redirect('/')->with('error','An error occurred. Please login.');            
        }

        return parent::render($request, $exception);
    }
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
