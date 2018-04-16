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

        $user = Model\User::where('email', '=', $sessionUser['email'])->first();

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