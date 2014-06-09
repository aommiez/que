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
$max_vn_id = (int)$max_vn_id;

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
    $que->setDate($item->getDate());
    $que->setTime(new DateTime($item->getTime().":00"));
    $que->setHnId($item->getHnId());
    $que->setPName(tis620_to_utf8($item->getPName()));
    $que->setPSurname(tis620_to_utf8($item->getPSurname()));
    $que->setDepId(tis620_to_utf8($item->getDepId()));
    $que->setDepName(tis620_to_utf8($item->getDepName()));

    $em->persist($que);
    $em->flush();

    $rs[] = $que->toArray();
}
echo json_encode($rs);