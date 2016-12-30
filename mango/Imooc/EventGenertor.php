<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of EventGenertor
 *
 * @author huyf
 */
abstract class EventGenertor {

    public $_action;
    private $observer = array();

    public function addServer($observer) {
        $this->observer[] = $observer;
    }

    public function notify() {
        foreach ($this->observer as $key => $val) {
            $this->observer[$key]->update();
        }
    }

    public function Detach($observer) {
        $obkey = array_search($observer, $this->observer);
        if ($obkey !== false) {
            unset($this->observer[$obkey]);
        }
    }

    public function subject($name) {
        $this->_action = $name;
    }

}
