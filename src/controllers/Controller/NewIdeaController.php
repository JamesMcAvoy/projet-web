<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class NewIdeaController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'CreateIdea');

    }

    public static function newIdea($req, $res){

        $sessionUser = self::getSessionUser($req);
        echo $sessionUser['email'];
        
        //echo Model\User::whereHas('user_id', function($user){ $user->where('email', '=', $sessionUser['email']);})->get();
        //$user->where('email', '=', $sessionUser['email']);

        $user = Model\User::where('email', '=', $sessionUser['email'])->first();

        $params = $req->getQueryParams();
        $post = $req->getParsedBody();
 
        $idea = new Model\Idea;
        $idea->idea_title = htmlentities($post['idea_title']);
        $idea->idea = htmlentities($post['idea']);
        $idea->user_id=$user->user_id;

        $idea->save();

        return $res->withStatus(302)->withHeader('Location', '/CreateIdea');
    }

}

?>