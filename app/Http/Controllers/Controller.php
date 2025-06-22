<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function BuildResponseSuccess($code, $message, $data = null): JsonResponse
    {
        $res = [
            'success' => true,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $res['data'] = $data;
        }

        return response()->json($res, $code);
    }
}
