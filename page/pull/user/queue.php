<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/9/14
 * Time: 11:43 PM
 */

$timeOut = 20000000;


$rs = array('last_ts'=> $_POST['last_ts'], 'list'=> array());
$em = Local::getEM();

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->where('a.updated_at > :updated_at')
    ->andWhere($qb->expr()->in('a.dep_id', $_POST['deps_id']))
    ->setParameter('updated_at', date('Y-m-d H:i:s', $_POST['last_ts']));

$time = 0;
while($time < $timeOut){
    usleep(500000);
    $time += 500000;
    $items = $qb->getQuery()->getResult();
    if(count($items)>0){
        foreach($items as $item){
            /** @var Main\Entity\Que\Que $item */
            $rs['list'][] = $item->toArray();
            $ts = $item->getUpdatedAt()->getTimestamp();
            if($ts > $rs['last_ts']){
                $rs['last_ts'] = $ts;
            }
        }
        break;
    }
}
echo json_encode($rs);