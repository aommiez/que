<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 5:12 AM
 */

$em  = Local::getEM();
$item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $_POST['vn_id']));
if(!is_null($item)){
    $item->setHide((bool)$_POST['hide']);
    $em->merge($item);
    $em->flush($item);
}

echo json_encode(array('success'=> true, 'hide'=> (bool)$_POST['hide']));