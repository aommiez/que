<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/9/14
 * Time: 11:43 PM
 */

$timeOut = 20;

$rs = array('last_ts'=> $_POST['last_ts'], 'list'=> array());
$em = Local::getEM();

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->where('a.updated_at > :updated_at')
    ->andWhere('a.dru=0')
    ->setParameter('updated_at', date('Y-m-d H:i:s', $_POST['last_ts']));

$qb_count = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb_count->select('count(a)')
    ->where('a.updated_at > :updated_at')
    ->andWhere('a.dru=1')
    ->setParameter('updated_at', date('Y-m-d H:i:s', $_POST['last_ts']))
    ->setMaxResults(1);

$time = 0;
while($time < $timeOut){
    sleep(1);
    $time += 1;
    if($qb_count->getQuery()->getSingleScalarResult() > 0){
        $items = $qb->getQuery()->getResult();
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