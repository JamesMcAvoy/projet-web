<?php

namespace Controllers\Middleware;

use Psr\Http\Message\ServerRequestInterface,
    React\Http\Response,
    Controllers\Controller;

final class CesiUnauthorizedMiddleware {

    /**
     * @var Array
     */
    private $paths = [];

    private static $roles = array(
        'student'   => 0,
        'BDE'       => 1,
        'employee'  => 2
    );

    /**
     * Constructor
     *
     * @param Array $path
     * @example
     * array(
     *  'employee'  => [
     *      '/page/admin',
     *      '/other/page/admin'
     *  ],
     *  'BDE'       => [
     *      '/page/bde'
     * ])
     */
    public function __construct(Array $paths) {

        $this->paths = $paths;

    }

    /**
     * Return a 403 error if URI and path attribute match
     * and if user has a lower role
     * @param Psr\Http\Message\ServerRequestInterface $request
     * @param callable $next
     */
    public function __invoke(ServerRequestInterface $request, callable $next) {

        //Always being a session
        $session = Controller::getSession($request);
        $session->begin();
        
        $session = Controller::getSessionUser($request);

        $pathUri = $request->getUri()->getPath();

        foreach($this->paths as $perm => $arrayPaths) {

            foreach($arrayPaths as $path) {

                //If path requested and user not logged of his role isn't important enough
                if($path == $pathUri && (
                    !isset($session) ||
                    self::$roles[$session['type']] < self::$roles[$perm]
                )) {
                    return Controller\ErrorController::error403(
                        $request,
                        new Response(403)
                    );
                }

            }

        }

        return $next($request);

    }

}