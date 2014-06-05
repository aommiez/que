<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:20 AM
 */

require_once 'bootstrap.php';

$em = Local::getEM();

$tool = new \Doctrine\ORM\Tools\SchemaTool($em);
$tool->updateSchema($em->getMetadataFactory()->getAllMetadata());

echo json_encode(array('success'=> true));