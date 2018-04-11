<?php

use PsrRouter\PsrRouter as Router,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Controllers\Controller\IndexController,
    Controllers\Controller\ErrorController;

$router = new Router();

/**
 * HTTP errors
 */
$router->setParam('404', function(Request $request, Response $response) {

    return ErrorController::error404($request, $response);

});

$router->setParam('405', function(Request $request, Response $response) {

    return ErrorController::error405($request, $response);

});

/**
 * Pages
 */
$router->get('/', function(Request $request, Response $response) {

    return IndexController::index($request, $response);

});

$router->post('/register', function(Request $request, Response $response) {

    return $response;

});

$router->post('/login', function(Request $request, Response $response) {

    return $response;

});

/**
 * @todo CSRF token
 */
$router->get('/logout', function(Request $request, Response $response) {

    return $response;

});