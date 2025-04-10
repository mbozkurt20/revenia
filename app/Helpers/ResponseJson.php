<?php

use Illuminate\Http\JsonResponse;

class ResponseJson {
    static function success($message = null, $data = null, $code = 200): JsonResponse
    {
        return response()->json(['status' => true, 'message' => __($message), 'data' => $data], $code);
    }
    static function error($message = null, $code = 400): JsonResponse
    {
        return response()->json(['status' => false, 'message' => __($message)], $code);
    }
}
