<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/12/14
 * Time: 10:55 PM
 */

$vn_id = $_POST['vn_id'];
$em = Local::getEM();

$call = new \Main\Entity\Que\CallDru();
$call->setVnId($vn_id);

$em->persist($call);
$em->flush();

echo json_encode(array('success'=> true));