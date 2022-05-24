<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

trait JsonResult
{
    /**
     * @param string $message
     * @param $data
     * @param string $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function result(string $message, $data = [], $status = 'success', int $statusCode = 200): JsonResponse
    {
        $result = [
            "message" => $message,
            "status" => $status,
            "data" => $data,
        ];
        return response()->json($result, $statusCode);
    }
}
