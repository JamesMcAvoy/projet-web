<?php

namespace Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

    public static function boot() {

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => CONF_DBDRIVER,
            'host'      => CONF_DBHOST,
            'port'      => CONF_DBPORT,
            'database'  => CONF_DBNAME,
            'username'  => CONF_DBUSER,
            'password'  => CONF_DBPASS,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

    }

}