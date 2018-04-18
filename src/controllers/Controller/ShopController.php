<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ShopController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'shop', [
        	'route' => 'shop',
        	'user' => self::getSessionUser($req),
        	'goodies' => self::get()
        ]);

    }


    /**
     * Return all items from the shop,  when ID is called, return the item related
     */
    public static function get($id = null) {

        if(!isset($id))
            return Model\Item::all();
        else
            return Model\Item::where('item_id', '=', $id)->get()->first();

    }

    /**
     * Return items for the carousel
     */
    public static function getCarousel() {

        return Model\Item::where('item_number', '>', '0')
                         ->orderBy('orders_nbr', 'desc')
                         ->take(3)
                         ->get();

    }

    /**
     * Return an image from an item
     */
    public static function image($req, $res, $id) {

        $image = Model\Item::select('item_picture')->where('item_id', '=', $id)->get()->first();

        if(!isset($image->item_picture))
            return Controller\ErrorController::error404($req, $res);
        else {
            $stream = $res->getBody();
            $stream->write($image->item_picture);
            return $res->withBody($stream)->withHeader('Content-Type', 'image');
        }

    }

}
