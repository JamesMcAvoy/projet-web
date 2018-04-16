<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class IdeasController extends Controller {

    public static function ideas($req,$res){

        $ideaWaiting = Idea::where('idea_state', '=', 'waiting');
        $ideaValid = Idea::where('idea_state', '=', 'valid');
        $ideaBlocked = Idea::were('idea_state', '=', 'Blocked');
        $idea = [
            'waiting' => $ideaWaiting,
            'valid' => $ideaValid,
            'blocked' => $ideaBlocked
        ];

        return self::render($res,'evenements',$idea);
    }

}

/*
Visiteur : voir les idées proposées (voir le nombre de votes)
Connecté : 
- soumettre une idée avec : titre, description (elle sera en attente)
- voter pour une idée
BDE : 
- valider idée (mettre dans evenements), avec date, image, description (notification du soumetteur de l'idée)
- administration idées : bloquée, an att, acceptée
Employé : bloquer une idée (notification BDE) (invisible pour tous à part BDE et employé)
*/

?>