<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 01/03/2019
 * Time: 15:21
 */

namespace BachNguyen\Core\Model;

use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

    public function __construct(array $attributes = [])
    {
        $dbSetting = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'auth_service',
            'username' => 'admin',
            'password' => 'quangbach1',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ];
        $capsule = new Capsule;
        $capsule->addConnection($dbSetting);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        parent::__construct($attributes);
    }


}