<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ProfilController extends Controller {

    public static function index($req, $res) {

        //Prevent access if not logged
        if(!self::sessionUserActive($req))
            return $res->withStatus(302)->withHeader('Location', '/');

        return self::render($res, 'profil', ['route' => 'profil', 'user' => self::getSessionUser($req)]);

    }

}