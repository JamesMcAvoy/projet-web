<?php

namespace Controllers\Middleware;

use Psr\Http\Message\ServerRequestInterface,
	RingCentral\Psr7\Response,
	Controllers\Controller;

final class CesiUnauthorizedMiddleware {

    /**
     * @var Array
     */
    private $paths = [];

    /**
     * Constructor
     *
     * @param Array $path
     * @example
     * array(
     *	'employee' 	=> [
     *		'/page/admin',
     *		'/other/page/admin'
     *	],
     *	'BDE' 		=> [
     *		'/page/bde'
     * ])
     */
    public function __construct(Array $paths) {

    	$this->paths = $paths;

    }

    /**
     * Return a 403 error if URI and path attribute match
     * and if user type and type attribute doesn't match
     * @param Psr\Http\Message\ServerRequestInterface $request
     * @param callable $next
     */
    public function __invoke(ServerRequestInterface $request, callable $next) {

    	//Always being a session
    	$session = Controller::getSession($request);
    	$session->begin();

    	$session = $session->getContents();

    	$pathUri = $request->getUri()->getPath();

    	foreach($this->paths as $perm => $arrayPaths) {

    		foreach($arrayPaths as $path) {

    			if($path == $pathUri) {
    				if(isset($session['user']['type']) && $perm != $session['user']['type']) {
    					return Controller\ErrorController::error403(
    						$request,
    						new Response(403)
    					);
    				}
    			}

    		}

    	}

    	return $next($request);

    }

}