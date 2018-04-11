<?php

namespace Controllers\Controller;

use Controllers\Controller,
	Models\Model;

final class RegisterController extends Controller {

    public static function register($req, $res) {

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

    	var_dump($errors);
    	return $res;

    }

}