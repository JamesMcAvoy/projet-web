<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class AdminController extends Controller {


    public static function index($req, $res) {

              return self::render($res, 'admin', [
            'route' => 'admin',
            'user' => self::getSessionUser($req),
            'ideas' => Controller\IdeaController::get()
        ]);

        }

    /**
     * create an event
     */
    public static function eventCreate($req, $res){

        //get session
        $session = parent::getSession($req)->getContents();

        //get post from form
        $post = $req->getParsedBody();       
        
        //get file from from
        $file = $req->getUploadedFiles();
        $filePicture = $file['event_picture'];
        $stream = $filePicture->getStream();

        //formats date from form
        $date_time = htmlentities($post['date'])." ".htmlentities($post['hour']);

        //create new event
        $event = new Model\Event;
        $event->event_title = $post['event_title'];
        $event->event = $post['event'];
        $event->event_price = $post['event_price'];
        $event->event_picture = $stream;
        $event->start_date = $date_time;
        $event->time = $post['time'];
        $event->time_between_each = $post['time_between_each'];
        $event->event_number = $post['event_number'];
        $event->event_state = $post['event_state'];
        $event->save();
        
            return $res->withStatus(302)->withHeader('Location', '/CreateEvent');
    }


    /**
     * create New category
     */
    public static function addCategory($req, $res){
        //get session
        $session = parent::getSession($req)->getContents();

        //get post from form
        $post = $req->getParsedBody();       

        //create new event
        $category = new Model\Category;
        $category->category_name = $post['category_name'];
        $Category->save();
        
        return $res->withStatus(302)->withHeader('Location', '/Add');
    }

    /**
     * create a new item
     */
    public static function addItem($req, $res){
        //get session
        $session = parent::getSession($req)->getContents();

        //get post from form
        $post = $req->getParsedBody();       
        
        //get file from from
        $file = $req->getUploadedFiles();
        $filePicture = $file['item_picture'];
        $stream = $filePicture->getStream();

        //get category
        $category = Model\Category::where('category_name', '=', $post['category_name'])->get()->first();

        //create new event
        $item = new Model\Item;
        $item->item_name = $post['item_name'];
        $item->item_desc = $post['item_desc'];
        $item->item_price = $post['item_price'];
        $item->item_picture = $stream;
        $item->item_number = $post['item_number'];
        $item->category_id = $category['category_id'];
        $item->save();
        
        return $res->withStatus(302)->withHeader('Location', '/Add');
    }



}
