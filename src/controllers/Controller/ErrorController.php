<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class ErrorController extends Controller {

    public static function error403($req, $res) {

        return self::abort($res, 403, ['message' => 'interdit']);

    }

    public static function error404($req, $res) {

        return self::abort($res, 404, ['message' => $req->getUri()->getPath()]);

    }

    public static function error405($req, $res) {

        return self::abort($res, 405, ['message' => $req->getMethod()]);

    }

    public static function error500($req, $res, $msg) {

    	return self::abort($res, 500, ['message' => $msg]);

    }

}