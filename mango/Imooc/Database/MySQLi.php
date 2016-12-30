<?php
namespace Imooc\Database;
class MySQLi implements \Imooc\IDatabase {
    protected $conn;
    function connect($host,$user,$pwd,$dbname){
        $con=  mysqli_connect($host, $user, $pwd, $dbname);
        $this->conn=$con;
        return $this;
    }
    function query($sql){
        $result=mysqli_query($this->conn, $sql);
        var_dump($result->fetch_object());
    }
    function close(){
        mysqli_close($this->conn);
    }
}
