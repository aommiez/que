<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/12/14
 * Time: 11:08 PM
 */

$timeOut = 20;


$last_id = $_GET['last_id'];

$em = Local::getEM();

if($last_id == 'init'){
    $qb = $em->getRepository('Main\Entity\Que\Call')->createQueryBuilder('a');
    $qb->select('max(a.id)');

    echo json_encode(array('last_id'=> $qb->getQuery()->getSingleScalarResult(), 'call'=> false));
    exit();
}

$qb = $em->getRepository('Main\Entity\Que\Call')->createQueryBuilder('a');
$qb->where('a.id>:id')->setParameter('id', $last_id)->setMaxResults(1);

$time = 0;
$i = 0;
while($time < $timeOut){
    sleep(1);
    $time += 1;
    $result = $qb->getQuery()->getResult();
    if(count($result)==0 || is_null($result))
        continue;

    $call = $result[0]->toArray();
    echo json_encode(array('last_id'=> $call['id'], 'call'=> $call));
    exit();
}

echo json_encode(array('last_id'=> $last_id, 'call'=> false));