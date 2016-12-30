<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Imooc;

/**
 * Description of Observer
 *
 * @author huyf
 */
interface Observer {
  public function update($no_notify=null);
}
