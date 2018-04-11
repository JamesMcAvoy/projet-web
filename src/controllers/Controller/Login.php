<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Login extends Controller {



    public static function login($req,$res){

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
                if(($user['email'] == $post['email']) && ($user['passord'] == $post['mdp'])){
                    //

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