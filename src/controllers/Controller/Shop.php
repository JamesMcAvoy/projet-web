<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Shop extends Controller {

    public static function shop($req,$res){

        $session = parent::getSession($req);

        $post = $req->getParseBody();

    }
}

/*
Visiteur : peux voir les produits proposés
- 3 articles les plus commendés
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

?>