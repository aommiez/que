<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 4:30 AM
 */

$em  = Local::getEM();
$item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $_POST['vn_id']));
if(!is_null($item)){
    $item->setSkip(true);
    $em->merge($item);
    $em->flush($item);
}

echo json_encode(array('success'=> true));