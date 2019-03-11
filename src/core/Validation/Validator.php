<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 01/03/2019
 * Time: 11:26
 */

namespace BachNguyen\Core\Validation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Illuminate\Container\Container;


class Validator
{

    public static function make(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        $loader = new FileLoader(new Filesystem, __DIR__.'/lang');
        $translator = new Translator($loader, 'en');
        $factory = new Factory($translator, new Container);
        $validator = $factory->make($data, $rules, $messages, $customAttributes);
        return $validator;
    }
}