<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Config
 *
 * @author huyf
 */
class Config implements \ArrayAccess {
    protected $path;
    protected $configs=array();
    public function __construct($path) {
        $this->path=$path;
    }
    public function offsetExists($offset) {
        return isset($this->configs[$offset]);
    }
    public function offsetGet($offset) {
        if(empty($this->configs[$offset])){
            $config=  require  $this->path."/".$offset.".php";
            $this->configs[$offset]=$config;
        }
        return $this->configs[$offset];
    }
    public function offsetSet($offset, $value) {
        throw new Exception("cannot write config file.");
    }
    public function offsetUnset($offset) {
        unset($this->configs[$offset]);
    }
}
