<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of FemateUserStrategy
 *
 * @author huyf
 */
class FemateUserStrategy implements UserStrategy {
  public function showAd() {
     echo "我是个女的 哈哈" ;
  }
  public function showCategory() {
      echo "我要钱";
  }
}
