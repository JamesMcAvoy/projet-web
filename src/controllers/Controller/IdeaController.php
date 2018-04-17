<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class IdeaController extends Controller {

    /**
     * Return the ideas
     */
    public static function get() {

        return Model\Idea::where('idea_state', '=', 'valid')
                         ->with('user')
                         ->orderBy('idea_number_vote', 'desc')
                         ->orderBy('post_at', 'desc')
                         ->get();

    }

    /**
     * Create a new idea
     */
    public static function create($req, $res) {

        //logged !
        if(!self::getSessionUser($req))
            return $res->withStatus(302)->withHeader('Location', '/events'); 

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        $errors = [];

        if(empty($post['idea_title']) || strlen($post['idea_title']) < 3) {
            $errors[] = "Le titre est trop court.";
        }
        if(empty($post['idea']) || strlen($post['idea']) < 5) {
            $errors[] = "La description est trop courte.";
        }

        //If errors
        if(!empty($errors)) {
            $session->setContents([
                'user' => $sessionUser,
                'msg' => [
                    'error' => $errors
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/events');
        }
 
        $idea = new Model\Idea;
        $idea->idea_title = $post['idea_title'];
        $idea->idea = $post['idea'];
        $idea->user_id = $sessionUser['id'];
        $idea->save();

        $session->setContents([
            'user' => $sessionUser,
            'msg' => [
                'valid' => 'Vous avez posté bien une idée d\'événement. Elle est désormais visible à tous et en attente de votes.'
            ]
        ]);

        return $res->withStatus(302)->withHeader('Location', '/events');

    }

    /**
     * Vote
     */
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