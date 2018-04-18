<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class AdminController extends Controller {

    public static function index($req, $res) {


              return self::render($res, 'admin', [
            'route' => 'admin',
            'user' => self::getSessionUser($req)
        ]);

        }



}