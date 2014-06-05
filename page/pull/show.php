<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/6/14
 * Time: 3:22 AM
 */

$timeOut = 20;

$em = Local::getEM();

$lastId = isset($_GET['last_id'])? $_GET['last_id']: 0;

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb
    ->where('a.id > :last_id')
    ->setParameter('last_id', $lastId);

$res = array('update'=> false);
$res['test'] = array();

$time = 0;
while($time < $timeOut){
    sleep(1);
    $time += 1;
    $items = $qb->getQuery()->getResult();
    $res['test'][] = count($items);
    if(count($items)==0)
        continue;

    $res['update'] = true;
    $res['data'] = array();
    $res['last_id'] = $lastId;
    foreach($items as $item){
        /** @var \Main\Entity\Que\Que $item */
        $res['data'][] = $item->toArray();
    }
    $res['last_id'] = $item->getId();
    break;
}

echo json_encode($res);