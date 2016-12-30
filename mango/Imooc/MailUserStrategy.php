<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of MailUserStrategy
 *
 * @author huyf
 */
class MailUserStrategy implements UserStrategy {
    public function showAd() {
        echo "真的我是男的";
    }
    public function showCategory() {
        echo "我是男的";
    }
}
