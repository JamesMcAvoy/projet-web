<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class RegisterController extends Controller {

    public static function register($req, $res) {

        $session = self::getSession($req);
        $session->begin();

        //Prevent register
        if(self::sessionUserActive($session))
            return $res->withStatus(302)->withHeader('Location', '/');

        $post = $req->getParsedBody();

        $errors = [];

        if(empty($post['nom']))
            $errors[] = 'Le nom est vide.';
        if(empty($post['prenom']))
            $errors[] = 'Le prénom est vide.';
        if(empty($post['courriel']))
            $errors[] = 'Le courriel est vide';
        elseif(!filter_var($post['courriel'], FILTER_VALIDATE_EMAIL))
            $errors[] = 'Le courriel n\'est pas valide';
        if(empty($post['mdp']))
            $errors[] = 'Le mot de passe est vide.';
        elseif(!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $post['mdp']))
            $errors[] = 'Le mot de passe doit contenir au moins une majuscule, au moins un chiffre et au moins 8 caractères.';

        //If errors
        if(!empty($errors)) {
            $session->setContents([
                'msg' => $errors
            ]);
            return $res->withStatus(302)->withHeader('Location', '/');
        }

        $session->setContents([
            'user' => array(
                'name_user'     => htmlentities($post['nom']),
                'first_name'    => htmlentities($post['prenom']),
                'email'         => htmlentities($post['courriel']),
                'type'          => 'student',
                'token'         => self::token()
            ),
            'msg' => array(
                'Votre compte a été créé. Vous pouvez maintenant vous connecter.'
            )
        ]);

        //model
        $user = Model\User::create([
            'name_user'     => htmlentities($post['nom']),
            'first_name'    => htmlentities($post['prenom']),
            'email'         => htmlentities($post['courriel']),
            'password'      => password_hash($post['mdp'], PASSWORD_BCRYPT)
        ]);

        $user->basket()->create();

        return $res->withStatus(302)->withHeader('Location', '/');

    }

}