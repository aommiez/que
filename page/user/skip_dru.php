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
    $item->setSkipDru(true);
    $em->merge($item);
    $em->flush($item);

    $fcache = 'que_dru.txt';
    $chache_ts = file_put_contents($fcache, $item->getUpdatedAt()->getTimestamp());
}

echo json_encode(array('success'=> true));