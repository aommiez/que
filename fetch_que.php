<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/16/14
 * Time: 11:04 AM
 */
require_once('bootstrap.php');

$em = Local::getEM();

$dt = new DateTime();
$dt->sub(new DateInterval('PT45M'));

$model = 'Main\Entity\Que\Que';
$qb = $em->getRepository($model)->createQueryBuilder('a');
$qb->where('a.time<=:time')
    ->andWhere('a.dru=1')
    ->andWhere('a.hide=0')
    ->setParameter('time', $dt->format('H:i:s'));

$q = $qb->getQuery();
$result = $q->getResult();

foreach($result as $q){
    /** @var Main\Entity\Que\Que $q */
    if($q->getHide()){
        continue;
    }

    $param = $q->toArray();
    $param['hide'] = true;

    $q->setHide(true);
    $em->merge($q);
    $em->flush();

    $json = json_encode(array('action'=> 'hide', 'param'=> $param));

    $wsClient = new \Main\Socket\Client\WsClient("localhost", 8081);

    echo $wsClient->sendData($json);
}