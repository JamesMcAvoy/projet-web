<?php

namespace Controllers;

class Test extends Controller{

    public static function test($req,$res){

        \Models\User::create(array(
            'name_user' => 'Brisset',
            'first_name' => 'Mathieu',
            'email' => 'mathieu.brisset@viacesi.fr',
            'password' => 'mathieu123'));

        return $res;
    }

}

/*
'name',
'first_name',
 'email',
'password',
'type'*/


?>