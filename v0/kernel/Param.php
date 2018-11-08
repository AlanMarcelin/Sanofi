<?php

namespace Kernel;

class Param{
    protected static $_table='param';

    public static function get($key){
        $params = ['appTitle'=>'Adresse','viewDir'=>'app/Views/'];
        return $params[$key];
    }
}