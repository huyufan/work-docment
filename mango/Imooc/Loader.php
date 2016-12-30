<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Loader
 *
 * @author huyf
 */
class Loader {
   public static function autoload($class){
       $file=BASEPATH.DIRECTORY_SEPARATOR.str_replace("\\", "/", $class).".php";
       if(!is_file($file)){
           echo $file." not find";
           exit;
       }
       require_once $file;
   } 
}
