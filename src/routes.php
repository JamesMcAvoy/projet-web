<?php

use PsrRouter\PsrRouter as Router,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Controllers\Controller\IndexController,
    Controllers\Controller\ErrorController,
    Controllers\Controller\RegisterController,
    Controllers\Controller\LoginController,
    Controllers\Controller\LogoutController;

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

$router->get('/login', function(Request $request, Response $response) {

    return LoginController::index($request, $response);

});
$router->post('/login', function(Request $request, Response $response) {

    return LoginController::login($request, $response);

});

$router->get('/logout', function(Request $request, Response $response) {

    return LogoutController::logout($request, $response);

});

$router->get('/register', function(Request $request, Response $response) {
    
    return RegisterController::index($request, $response);

});
$router->post('/register', function(Request $request, Response $response) {

    return RegisterController::register($request, $response);

});

/**
 * @todo
 */
$router->get('/evenements', function(Request $request, Response $response) {
	
	return IndexController::evenements($request, $response);
});

$router->get('/boite_a_idees', function(Request $request, Response $response) {
	
	return IndexController::boite_a_idees($request, $response);
});

$router->get('/proposer_idee', function(Request $request, Response $response) {
	
	return IndexController::proposer_idee($request, $response);
});