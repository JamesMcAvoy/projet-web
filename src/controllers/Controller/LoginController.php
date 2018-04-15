<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class LoginController extends Controller {

    public static function index($req, $res) {

        //Prevent login
        if(self::sessionUserActive($req))
            return $res->withStatus(302)->withHeader('Location', '/');

        $session = parent::getSession($req);
        $sessionContents = $session->getContents();

        if(isset($sessionContents['msg'])) {
            $msg = $sessionContents['msg'];
            unset($sessionContents['msg']);
            $session->setContents($sessionContents);
            return self::render($res, 'login', ['msg' => $msg]);
        }

        return self::render($res, 'login');

    }

    public static function login($req, $res){

        $session = parent::getSession($req);

        //Prevent login
        if(self::sessionUserActive($req))
            return $res->withStatus(302)->withHeader('Location', '/');

        $post = $req->getParsedBody();

        $errors = [];

        if(empty($post['courriel'])){
            $errors[]= "Entrez votre courriel.";
        }
        if(empty($post['mdp'])){
            $errors[]= "Entrez votre mot de passe.";
        }

        //If errors
        if(!empty($errors)) {
            $session->setContents([
                'msg' => $errors
            ]);
            return $res->withStatus(302)->withHeader('Location', '/login');
        }

        if(Model\User::where('email', '=', $post['courriel'])->get()) {
            $user = Model\User::where('email', '=', $post['courriel'])->get()->first();

            if(password_verify($post['mdp'], $user->password)) {
                $session->setContents([
                    'user' => array(
                        'email'         => $user->email,
                        'name_user'     => $user->name_user,
                        'first_name'    => $user->first_name,
                        'type'          => $user->type,
                        'token'         => self::token()
                    )
                ]);
                return $res->withStatus(302)->withHeader('Location', '/');
            } else {
                $errors[] = "Votre courriel ou votre mot de passe est incorrect.";
            }  
        } else {
            $errors[] = "Votre courriel ou votre mot de passe est incorrect.";
        }

        //If email/pass errors
        $session->setContents([
            'msg' => $errors
        ]);
        return $res->withStatus(302)->withHeader('Location', '/login');

    }

}