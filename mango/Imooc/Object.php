<?php
namespace Imooc;
class Object {
    public $array=array();
  public  function __get($name){
      return $this->array[$name];
  }
  public function __set($name, $value) {
     $this->array[$name]=$value;
  }
  public function __call($name, $arguments) {
      var_dump($name,$arguments);
  }
  public static function __callStatic($name, $arguments) {
        var_dump($name,$arguments);
  }
  public function __toString() {
      return __CLASS__;
  }
  public function __invoke() {
      //对象当函数来使用;
      //$object=new  object();
      //$object();
  }
}
