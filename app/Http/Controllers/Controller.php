<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function asJson(array $params = [], $code = 200)
    {
        return response()->json($params, $code);
    }

    protected function errorResponse(\Exception $exception, $customErrorMessage = null): JsonResponse
    {
        Log::error("{$exception->getMessage()} - {$exception->getFile()} - {$exception->getLine()}");
        Log::debug($exception->getTraceAsString());

        return $this->asJson([
            'message' => $customErrorMessage ?? "{$exception->getMessage()} - {$exception->getFile()} - {$exception->getLine()}",
        ], 500);
    }
}
