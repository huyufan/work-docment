<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of AllUser
 *
 * @author huyf
 */
class AllUser implements \Iterator {
    public $ids;
    public $index;
    public function __construct(){
        $user=  Factory::getDatabase();
        $result=$user->query("select id from proname");
        $this->ids=$result->fetch_all(MYSQLI_ASSOC);
    }
   public function key(){
       return $this->index;
   }
   public function next(){
       $this->index++;
   }
   public function current(){
      $id= $this->ids[$this->index]["id"];
      return Factory::createProname($id);
   }
   public function rewind() {
      $this->index=0;
   }
   public function valid() {
       return isset($this->ids[$this->index]);
   }
}
