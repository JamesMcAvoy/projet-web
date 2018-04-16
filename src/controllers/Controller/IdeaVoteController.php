<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class IdeaVoteController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'ideas');

    }

    public static function ideaVote($req, $res){

        $sessionUser = self::getSessionUser($req);
        $params = $req->getQueryParams();

        $idea = Model\Idea::where('idea_id', '=', $params['idea_id'])->first(); 
        $user = $sessionUser['id'];

        if( self::sessionUserActive($req) &&
            empty(Model\Voted::where('idea_id', '=', $idea->idea_id)) &&
            empty(Model\Voted::where('user_id', '=', $user))
            ) {
                $Voted = new Model\Registered;
                $Voted->idea_id=$idea->idea_id;
                $Voted->user_id=$user;
                $Voted->save();
        }
        // la vue ideas n'existe pas encore
        return $res->withStatus(302)->withHeader('Location', '/ideas');
    }

}

?>