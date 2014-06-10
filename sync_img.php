<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 10:18 AM
 */

require_once 'bootstrap.php';
$dir = 'p_image/';

$vem = Local::getVEM();
$qb = $vem->getRepository('Main\Entity\View\PImage')->createQueryBuilder('a');

$start = 0;
$pp = 10;
$qb->orderBy('a.hn_id')->setFirstResult($start)->setMaxResults($pp);
$query = $qb->getQuery();
$result = $query->getResult();
for($i = 1; !is_null($result); $i++){

    foreach($result as $key => $item){
        /** @var Main\Entity\View\PImage $item */
        if($item->getImage()==null){
            continue;
        }

        $path = $dir.$item->getHnId().'.bmp';
        file_put_contents($path, $item->getImage());
        echo "save hn_id ".$item->getHnId()." to ".$path."\n";

        sleep(1);
    }
    $query->free();

    $start = $i * $pp;
    $qb->setFirstResult($start);
    $query = $qb->getQuery();
    $result = $query->getResult();
}