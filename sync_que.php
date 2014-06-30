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
    $que->setTimeDru(new DateTime($item->getTime().":00"));
    $que->setHnId($item->getHnId());
    $que->setPName(tis620_to_utf8($item->getPName()));
    $que->setPSurname(tis620_to_utf8($item->getPSurname()));
    $que->setDepId(tis620_to_utf8($item->getDepId()));
    $que->setDepName(tis620_to_utf8($item->getDepName()));
    $que->setDru(false);
    $que->setCas($item->getCas());
    $que->setPtType($item->getPttype());

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

    // download mp3 name,surname
    $lang = 'th';
    if(!preg_match('/[ก-๙]/i', $que->getPName())){
        $lang = 'en';
    }
    $fcontent = file_get_contents("http://translate.google.com/translate_tts?tl={$lang}&ie=UTF-8&q=".urlencode($que->getPName()));
    $fp = fopen("public/sounds/firstname/".$que->getHnId().".mp3", 'w');
    fwrite($fp, $fcontent);
    fclose($fp);

    $lang = 'th';
    if(!preg_match('/[ก-๙]/i', $que->getPSurname())){
        $lang = 'en';
    }
    $fcontent = file_get_contents("http://translate.google.com/translate_tts?tl={$lang}&ie=UTF-8&q=".urlencode($que->getPSurname()));
    $fp = fopen("public/sounds/lastname/".$que->getHnId().".mp3", 'w');
    fwrite($fp, $fcontent);
    fclose($fp);

    $rs[] = $que->toArray();
}

$dru_qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$dru_qb->select('max(a.last_ser)')->where('a.dru=1');

$last_ser = $dru_qb->getQuery()->getSingleScalarResult();
$last_ser = (int)$last_ser;

$drug_vqb = $vem->getRepository('Main\Entity\View\QDrug')->createQueryBuilder('a');
$drug_vqb
    ->where('a.ser>:last_ser')
    ->setParameter('last_ser', $last_ser);

$items = $drug_vqb->getQuery()->getResult();
$rs = array();
$add = array();
foreach($items as $item){
    /** @var Main\Entity\View\QDrug $item */

    $que = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $item->getVnId()));
    if(is_null($que)){
        continue;
    }
    // new dru set true
    $isNew = !$que->getDru();

    $que->setDru(true);
    $que->setTimeDru(new DateTime($item->getTime().":00"));
    $que->setLastSer($item->getSer());
    //$que->setHide(false);

    $em->merge($que);
    $em->flush();
    $rs[] = $que->toArray();

    // new dru array add
    if($isNew){
        $add[] = $que->toArray();
    }
}

if(count($add) > 0){
    $wsClient = new \Main\Socket\Client\WsClient("localhost", 8081);

    $json = json_encode(array(
        'action'=> 'add',
        'param'=> $add
    ));
    echo $wsClient->sendData($json);
    unset($wsClient);
}