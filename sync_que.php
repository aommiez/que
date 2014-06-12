<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 5:18 PM
 */

require_once 'bootstrap.php';

set_time_limit(300);

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
    $que->setDru($item->getDru());
    $que->setCas($item->getCas());

    $em->persist($que);
    $em->flush();

    $imgPath = 'public/img/users/'.$item->getHnId().'.bmp';
    if(!file_exists($imgPath)){
        $pImg = $vem->getRepository('Main\Entity\View\PImage')->findOneBy(array('hn_id'=> $item->getHnId()));
        if(!is_null($pImg->getImage())){
            file_put_contents($imgPath, $pImg->getImage());
        }
        unset($pImg);
    }

    $rs[] = $que->toArray();
}
echo json_encode($rs);

$dru_qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$dru_qb->select('max(a.vn_id)')->where('a.dru=1');

$dru_max_vn_id = $dru_qb->getQuery()->getSingleScalarResult();
$dru_max_vn_id = (int)$dru_max_vn_id;

$dru_vqb = $vem->getRepository('Main\Entity\View\QDru')->createQueryBuilder('a');
$dru_vqb
    ->where('a.vn_id>:vn_id')
    ->andWhere($dru_qb->expr()->isNotNull('a.timedru'))
    ->setParameter('vn_id', $dru_max_vn_id);

$items = $dru_vqb->getQuery()->getResult();
$rs = array();
foreach($items as $item){
    /** @var Main\Entity\View\QDru $item */

    $que = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $item->getVnId()));
    if(is_null($que)){
        continue;
    }
    $que->setDru(true);
    //$que->setHide(false);

    $em->merge($que);
    $em->flush();

    $rs[] = $que->toArray();
}
echo json_encode($rs);