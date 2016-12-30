<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Application
 *
 * @author huyf
 */
class Application {
    public static function getInstance($alias='conf'){
       $object= \Imooc\Register::get($alias);
       if(!$object){
           $path=BASEPATH."/configs";
         $object= new  \Imooc\Config($path);
         \Imooc\Register::set($alias, $object);
       }
       return $object;
    }
}
