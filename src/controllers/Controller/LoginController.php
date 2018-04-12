<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class LoginController extends Controller {

    public static function login($req, $res){

        $session = parent::getSession($req);

        //Prevent register
        if(self::sessionUserActive($session))
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
            return $res->withStatus(302)->withHeader('Location', '/');
        }

        if(User::where('email', '=', $post['courriel'])) {
            $user = User::where('email', '=', $post['courriel'])->get();

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
        return $res->withStatus(302)->withHeader('Location', '/');

    }

}