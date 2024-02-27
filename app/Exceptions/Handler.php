<?php

namespace App\Exceptions;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;
use function PHPUnit\Framework\matches;

class Handler extends ExceptionHandler
{

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     *
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    protected $status;
    protected$error;
    protected$help;

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $class = match ($e->getModel()) {
                User::class => 'User',
                default => 'record'
            };

            $response = [
                'status' => false,
                'message' =>  $class . ' not found'
            ];

            return response()->json($response)->setStatusCode(Response::HTTP_NOT_FOUND);
        }
        return parent::render($request, $e);

    }
}
