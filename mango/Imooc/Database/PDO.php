<?php
namespace Imooc\Database;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDO
 *
 * @author huyf
 */
class PDO implements \Imooc\IDatabase {
    protected $conn;
    public function connect($host,$user,$pwd,$dbname){
        $conn=new \PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
        $this->conn=$conn;
    }
    function query($sql){
        return $this->conn->query($sql);
    }
    function close(){
        unset($this->conn);
    }
}
