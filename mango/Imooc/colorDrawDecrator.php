<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of colorDrawDecrator
 *
 * @author huyf
 */
class colorDrawDecrator implements DrawDecorator {
    protected $color;
    public function __construct($color='red'){
    $this->color=$color;    
    }
    public function beforeDraw() {
        echo "<div style='color:{$this->color}'>";
    }
    
    public function afterDraw() {
        echo "</div>";
    }
}
