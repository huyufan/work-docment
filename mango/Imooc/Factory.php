<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Factory
 *
 * @author huyf
 */
class Factory {
    static function createDatabase(){
        $object= \Imooc\Database::getInstance();
        return $object;
    }
    
//    static function getDatabase(){
//        $mysqli=  Register::get("mysqli");
//        if($mysqli == false){
//            $mysqli=new \Imooc\Database\MySQLi();
//            Register::set("mysqli", $mysqli->connect("127.0.0.1", "root", "111111", "test"));
//        }
//        return $mysqli;
//    }
     static function getDatabase($id='master'){
         $key ='database'.$id;
         if($id=='master'){
          $conf=   Application::getInstance();
          var_dump($conf);die();
         }
     }
    static function createProname($id){ 
        if(\Imooc\Register::get("name".$id)){
            return \Imooc\Register::get("name".$id);
        }else{
           $object=new \Imooc\Proname($id);
           \Imooc\Register::set("name".$id, $object);
           return $object;
        }
        
    }
}
