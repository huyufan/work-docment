<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Proname
 *
 * @author huyf
 */
class Proname {

    public $id;
    public $pid;
    public $name;
    public $time;
    public $db;

    public function __construct($id) {
        $this->db = new \Imooc\Database\MySQLi();
        $this->db->connect("127.0.0.1", "root", "111111", "test");
        $res = $this->db->query("select * from proname where id=$id");
        $data=$res->fetch_assoc();
        $this->id=$data["id"];
        $this->pid=$data["pid"];
        $this->name=$data["name"];
        $this->time=$data["time"];
    }

    public function __destruct() {
        $this->db->query("update proname set name='{$this->name}',pid='{$this->pid}',time='{$this->time}' where id={$this->id}");
        $this->db->close();
    }

}
