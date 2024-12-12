<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionsHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionsHandler
{
    public function render($request, Throwable $e)
    { 
        if ($e instanceof NotFoundHttpException) {
            return response()->json(["data" => $e->getMessage()], 400);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json(["data" => $e->getMessage()], 400);
        }
        return parent::render($request, $e);
    }
}
