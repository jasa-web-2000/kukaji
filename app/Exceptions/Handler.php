<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TooManyRequestsHttpException) {
            // Ambil waktu tunggu dalam detik dari header Retry-After
            $retryAfter = $exception->getHeaders()['Retry-After'] ?? 60;

            // Format waktu menjadi menit dan detik (misal: "2 menit 30 detik")
            $minutes = floor($retryAfter / 60);
            $seconds = $retryAfter % 60;

            $waitTime = $minutes > 0
                ? ($minutes . ' menit' . ($seconds > 0 ? ' ' . $seconds . ' detik' : ''))
                : ($seconds . ' detik');

            return back()->withErrors([
                'login' => "Terlalu banyak percobaan login gagal. Coba lagi dalam {$waitTime}.",
            ])->withInput();
        }

        return parent::render($request, $exception);
    }
}
