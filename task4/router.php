<?php

$endpoints = [
    '/circle' => ['get', 'post'],
    '/triangle' => ['get', 'post'],
    '/square' => ['get', 'post']
];

$method = strToLower($_SERVER['REQUEST_METHOD']);
$url = $_SERVER['PATH_INFO'] ?? '';

$isPageExist = isset($endpoints[$url]);
$isMethodAllowed = $isPageExist && in_array($method, $endpoints[$url]);

if (!$isPageExist) {
    ErrorHandler::sendErrorMessage('404');
} elseif (!$isMethodAllowed) {
    ErrorHandler::sendErrorMessage('405');
} else {
    $typeShape = preg_replace('!/+!', '', $url);
    $data = ['type' => $typeShape, 'request' => $_REQUEST];

    try {
        $response = (new ShapeController())->handler($data);
        if (isset($response['error'])) {
            ErrorHandler::sendErrorMessage($response['error']);
        } else {
            echo json_encode(
                ['success' => true, 'data' => $response],
                JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE
            );
        }
    } catch (JsonException $e) {
    }
}