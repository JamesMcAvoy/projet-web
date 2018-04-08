<?php

use PsrRouter\PsrRouter as Router,
    Controllers\IndexController,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response;

$router = new Router();

$router->get('/', function(Request $request, Response $response) {

    return IndexController::index($request, $response);

});