<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 01/03/2019
 * Time: 10:23
 */

$container = $app->getContainer();
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $response->withStatus(405)
            ->withHeader('Content-type', 'application/json')
            ->withJson([
                'status' => 405,
                'error_code' => 405,
                'message' => "Method not allow"
            ]);
    };
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $response->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->withJson([
                'status' => 404,
                'error_code' => 404,
                'message' => "Route not found"
            ]);
    };
};

$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'application/json')
            ->withJson([
                'status' => 500,
                'error_code' => 500,
                'message' => $exception->getMessage()
            ]);
    };
};