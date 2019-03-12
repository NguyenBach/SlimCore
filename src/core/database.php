<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 12/03/2019
 * Time: 15:55
 */

$container = $app->getContainer();
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();