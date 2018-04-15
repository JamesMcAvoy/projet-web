<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class LogoutController extends Controller {

    public static function logout($req, $res) {

        $session = parent::getSession($req);
        $params = $req->getQueryParams();

        if(isset($params['token']) &&
           self::sessionUserActive($req) &&
           ($params['token'] == $session->getContents()['user']['token'])
        ) {
        	//destroy session
            $session->end();
        }
        return $res->withStatus(302)->withHeader('Location', '/');

    }
    
}