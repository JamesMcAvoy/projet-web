<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Login extends Controller {

    public static function login($req,$res){

        $session = parent::getSession($req);

        $post = $req->getParseBody();

        $error = [];

        if(empty($post['email'])){
            $error[]= "entrez votre mail";
        }
        if(empty($post['mdp'])){
            $error[]= "entrez votre mot de passe";
        }

        if(isset($post['email']) && isset($post['mdp'])){
            if(User::where('email','=', $post['email'])){
                $user = User::where('email','=', $post['email'])->get();
                if(($user['email'] == $post['email']) && (password_verify($post['mdp'], $user['password']))){
                    $session->setContents(
                        'email' -> $user['email'],
                        'name_user' -> $user['name_user'],
                        'first_name' -> $user['first_name'],
                        'type' -> $user['type'],
                        'token' -> self::token()
                    );
                    return $res->withStatus(302)->withHeader('Location', '/');
                }
                else{
                    $error[] = "votre email ou votre mot de passe sont incorrecte";
                }  
            }
            else{
                $error[] = "votre email ou votre mot de passe sont incorrecte";
            }
            
        }

    }

}

?>