<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/16/14
 * Time: 11:04 AM
 */

$em = Local::getEM();

$dt = new DateTime();
$dt->sub(new DateInterval('PT45M'));

$model = 'Main\Entity\Que\Que';
$q = $em->createQuery("UPDATE {$model} a SET a.hide=1, a.updated_at=:updated_at WHERE a.time<=:time AND a.dru=0 AND a.hide=0");
$q->setParameter('time', $dt->format('H:i:s'))
    ->setParameter('updated_at', date('Y-m-d H:i:s'));

$model = 'Main\Entity\Que\Que';
$q = $em->createQuery("UPDATE {$model} a SET a.hide=1, a.updated_at=:updated_at WHERE a.time_dru<=:time AND a.dru=1 AND a.hide=0");
$q->setParameter('time', $dt->format('H:i:s'))
    ->setParameter('updated_at', date('Y-m-d H:i:s'));

echo json_encode(array('success'=> true));