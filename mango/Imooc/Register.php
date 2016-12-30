<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Register
 *
 * @author huyf
 */
class Register {
    protected static $objects;
    public static function set($alias,$object){
        if(!self::$objects[$alias]){
        self::$objects[$alias]=$object;   
        }
    }
    public static function get($alias){
      return  self::$objects[$alias];
    }
    public function _unset($alias){
        unset(self::$objects[$alias]);
    }
}
