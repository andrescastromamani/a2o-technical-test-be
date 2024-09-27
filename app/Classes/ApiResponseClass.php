<?php

namespace App\Classes;

class ApiResponseClass
{
    public static function sendResponse($data, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $data
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}
