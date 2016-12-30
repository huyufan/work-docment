<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Canvas
 *
 * @author huyf
 */
class Canvas {
    public $data;
    protected $decorator;
    public function init($width=20,$height=10){
        $data=array();
        for($i=0;$i<$height;$i++){
            for($j=0;$j<$width;$j++){
                $data[$i][$j]="*";
            }
        }
        $this->data=$data;
    }
    public function addDrawDecorator($objrator){
        $this->decorator[]=$objrator;
    }
    public function beforeDraw(){
        foreach($this->decorator as $key=>$val){
            $this->decorator[$key]->beforeDraw();
        }
    }
    
    public function afterDraw(){
          foreach($this->decorator as $key=>$val){
            $this->decorator[$key]->afterDraw();
        }  
    }
    public function draw(){
        $this->beforeDraw();
        foreach($this->data as $val){
            foreach($val as $char){
                echo $char; 
            }
            echo "<br />\n";
           
        } 
         $this->afterDraw();
    }
    
    public function rect($a1,$a2,$b1,$b2){
        foreach($this->data as $k=>$v){
            if($k<$a1 or $k>$a2)continue;
            foreach($v as $k2=>$v2){
                if($k2<$b1 or $k2>$b2)continue;
                $this->data[$k][$k2]="1";
            }
        }
    }
}
