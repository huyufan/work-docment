<?php
namespace Imooc\Database;

//use Imooc\Database;
class MySQL implements \Imooc\IDatabase {
  protected $conn;
  function connect($host,$user,$passwd,$dbname){
      $con=  mysql_connect($host, $user, $passwd);
      mysql_select_db($dbname);
      $this->conn=$con;
      
  }
  function query($sql){
     $result=mysql_query($sql,$this->conn);
     return $result;
     
  }
  function close(){
      mysql_close($this->conn);
  }
}
