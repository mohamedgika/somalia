<?php

if (! function_exists('responseSuccessData')) {
    function responseSuccessData(string|array|object $data, string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}

if (! function_exists('responseSuccessMessage')) {
    function responseSuccessMessage(string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
        ], $status);
    }
}

if (! function_exists('responseErrorMessage')) {
    function responseErrorMessage(array|string|object $error, int $status = 400)
    {
        return response()->json([
            'statusType' => false,
            'status'     => $status,
            'error'      => $error,
        ], $status);
    }
}


