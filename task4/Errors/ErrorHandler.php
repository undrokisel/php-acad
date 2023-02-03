<?php

class ErrorHandler
{
    public static function sendErrorMessage($code)
    {
        $errorMessages = [
            404 => "Page not found",
            405 => "Method not allowed",
            422 => "Bad request: initial parameters are insufficient or incorrect",

        ];
        try {
            http_response_code($code);
            echo(json_encode([
                'success' => false,
                'error' => [
                    'code' => $code,
                    'message' => $errorMessages[$code]
                ],

            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE));
        } catch (JsonException $e) {
        }
    }

}