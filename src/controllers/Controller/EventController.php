<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class EventController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'events', ['route' => 'events', 'user' => self::getSessionUser($req)]);

    }

}