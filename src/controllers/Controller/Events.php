<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Events extends Controller {

    public static function events($req,$res){

        $session = parent::getSession($req);

        $post = $req->getParseBody();

    }

}

/*
évenements du moi visible pour tous
visiteurs : Evenements visible pour tout visiteur
+ BDE : édite évenement avec : description, image, date, prix, récurence; accéder liste inscrit : PDF, CSV.
+ Ceux connectés : inscription à un evenement
+ employés : Bloquer evenement (notification BDE)
*/

?>