<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class ErrorController extends Controller {

    public static function error403($req, $res) {

        return self::abort($res, 403, ['message' => 'interdit', 'background' => 'error403.png', 'smiley' => 'AH.png']);

    }

    public static function error404($req, $res) {

        return self::abort($res, 404, ['message' => $req->getUri()->getPath(), 'background' => 'BG.png', 'smiley' => 'AH.png']);

    }

    public static function error405($req, $res) {

        return self::abort($res, 405, ['message' => $req->getMethod(), 'background' => 'error405.png', 'smiley' => 'AH.png']);

    }

    public static function error500($req, $res, $msg) {

    	return self::abort($res, 500, ['message' => $msg, 'background' => 'error500.png', 'smiley' => 'AH.png']);

    }

}