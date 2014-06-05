<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:24 AM
 */
require_once 'bootstrap.php';

$_page = isset($_GET['page'])? $_GET['page']: 'index';
include '_template/header.php';
include 'page/'.$_page.'.php';
include '_template/footer.php';