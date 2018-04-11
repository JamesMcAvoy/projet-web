<?php

use PsrRouter\PsrRouter as Router,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Controllers\Controller\IndexController,
    Controllers\Controller\ErrorController,
    Controllers\Controller\RegisterController;

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

    return IndexController::inscription($request, $response);

});

$router->post('/register', function(Request $request, Response $response) {

    return RegisterController::register($request, $response);

});

$router->post('/login', function(Request $request, Response $response) {

    return $response;

});

$router->get('/evenements', function(Request $request, Response $response) {
	
	return IndexController::evenements($request, $response);
});

$router->get('/boite_a_idees', function(Request $request, Response $response) {
	
	return IndexController::boite_a_idees($request, $response);
});

$router->get('/proposer_idee', function(Request $request, Response $response) {
	
	return IndexController::proposer_idee($request, $response);
});

/**
 * @todo CSRF token
 */
$router->get('/logout', function(Request $request, Response $response) {

    return $response;

});