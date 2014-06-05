<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 5:18 PM
 */

require_once 'bootstrap.php';

$em = Local::getEM();
$vem = Local::getVEM();

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->select('max(a.vn_id)');

$max_vn_id = $qb->getQuery()->getSingleScalarResult();

$vqb = $vem->getRepository('Main\Entity\View\QVisit')->createQueryBuilder('a');
$vqb
    ->where('a.vn_id>:vn_id')
    ->setParameter('vn_id', $max_vn_id);

$items = $vqb->getQuery()->getResult();


$rs = array();
foreach($items as $item){
    /** @var Main\Entity\View\QVisit $item */
    $que = new Main\Entity\Que\Que();
    $que->setId($item->getVnId());
    $que->setVnId($item->getVnId());
    $que->setComplete(false);
    $que->setSkip(false);
    $que->setDate($item->getDate());
    $que->setTime($item->getDate());
    $que->setHnId($item->getHnId());
    $que->setPName($item->getPName());
    $que->setPSurname($item->getPSurname());
    $que->setDepId($item->getDepId());
    $que->setDepName($item->getDepName());

    $em->persist($que);
    $em->flush();

    $rs[] = $que->toArray();
}
echo json_encode($rs);