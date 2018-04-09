<?php

use PsrRouter\PsrRouter as Router,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Controllers\IndexController,
    Controllers\ErrorController;

$router = new Router();

//404 error
$router->setParam('404', function(Request $request, Response $response) {

    return ErrorController::error404($request, $response);

});

//index page
$router->get('/', function(Request $request, Response $response) {

    return IndexController::index($request, $response);

});

/**
 * @todo post register/login
 */

$router->post('/register', function(Request $request, Response $response) {

    return $response;

});

$router->post('/login', function(Request $request, Response $response) {

    return $response;

});