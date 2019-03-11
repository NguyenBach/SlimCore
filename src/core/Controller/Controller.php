<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 01/03/2019
 * Time: 15:18
 */

namespace BachNguyen\Core\Controller;


class Controller
{
    protected $logger;

    public function __construct($container)
    {
        $this->logger = $container->get('logger');
    }

}