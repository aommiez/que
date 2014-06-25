<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:57 PM
 */

namespace Main\CTL;


class BaseCTL {
    public $param = array();
    public function init($param = array()){
        $this->param = $param;
    }
} 