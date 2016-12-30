<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

interface IDatabase
{
    function connect($host,$user,$pwd,$dbname);
    
    function query($sql);
    
    function close();
}
/**
 * Description of Database
 *
 * @author huyf
 */
class Database {
    protected static $db;
    private function __construct(){
        
    }
    public static function getInstance(){
        if(self::$db){
            return self::$db;
        }else{
            self::$db=new self();
        }
        return self::$db;
    }
    public function where($where){
        echo 1;
        return $this;
    }
    
    public function order($order){
        return $this;
    }
    
    public function limit($limit){
        return $this;
    }
}
