<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class OldEvents extends Controller {

    public static function oldEvent($req,$res){

        $session = parent::getSession($req);

        $post = $req->getParseBody();

    }
}

/*
Visiteur : Peux voir les évenements passés, les photos et les commentaires
Connecté : peux poster des commentaires et des like
Inscrit évenement : ajouter photos
BDE : administration : suppr photos, ajout photos, suppr commentaires, suppr like ? bloquer débloquer etc...
Employé :
- bloquer photo ou commentaires (notification BDE)
- télécharger photos (fichier rar)
*/

?>