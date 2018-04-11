<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class LogoutController extends Controller {

    public static function logout($req, $res) {

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

        if(isset($params['token']) && ($params['token'] == $session['user']['token'])) {
            $session->end();
        }
        return $res->withStatus(302)->withHeader('Location', '/');

    }
    
}