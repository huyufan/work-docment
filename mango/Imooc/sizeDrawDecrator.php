<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of sizeDrawDecrator
 *
 * @author huyf
 */
class sizeDrawDecrator implements DrawDecorator {
    protected $size;
    public function __construct($size="14") {
        $this->size=$size;
    }
    public function beforeDraw() {
        echo "<div style='font-size:{$this->size}'>";
    }
    public function afterDraw() {
        echo "</div>";
    }
}
