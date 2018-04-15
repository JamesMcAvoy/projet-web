<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ShopController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'shop', ['route' => 'shop', 'user' => self::getSessionUser($req)]);

    }

/*
    public static function shop($req,$res){

        $goodies = Model\Item::all();

        return self::render($res,'evenements',$goodies);

    }*/
}

/*
Visiteur : peux voir les produits proposés
- 3 articles les plus commandés
- filtre...
Connecté : 
- peux faire un panier avec les différents éléments à commander. 
- si panier pas validé il le garde tel qu'il l'a laissé et le retrouve lors de sa prochaine connection
- si validé : le panier est mis dans Orders, le BDE est notifié
BDE :
- administration produits : ajout, suppression, modification (nom, description, prix, catégorie)
- Création, suppression, modification des catégories.
Autre:
- préparer terrain : paypal.
*/