<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 4:43 AM
 */

$em  = Local::getEM();
$item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $_POST['vn_id']));

$remark = "";
if(isset($_POST['remark'])) $remark = $_POST['remark'];
if(!is_null($item)){
    $item->setRemark($remark);
    $em->merge($item);
    $em->flush();
}

echo json_encode(array('success'=> true, 'remark'=> $_POST['remark']));