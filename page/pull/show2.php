<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/6/14
 * Time: 3:22 AM
 */

$timeOut = 20;

$em = Local::getEM();

$lastId = isset($_GET['last_ts'])? $_GET['last_ts']: 0;

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->select('count(a)')
    ->where('a.updated_at > :updated_at')
    ->andWhere('a.dep_id = :dep_id')
    ->setParameter('dep_id', $_POST['dep_id'])
    ->setParameter('updated_at', date('Y-m-d H:i:s', $_POST['last_ts']));

$qb2 = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb2->where('a.dep_id = :dep_id')
    ->andWhere('a.skip=0')
    ->andWhere('a.hide=0')
    ->setParameter('dep_id', $_POST['dep_id']);


$res = array('update'=> false);
$res['html'] = "";
$res['last_ts'] = $_POST['last_ts'];

$html = "";

$time = 0;
$i = 0;
while($time < $timeOut){
    sleep(1);
    $time += 1;
    if($qb->getQuery()->getSingleScalarResult()==0)
        continue;

    $items = $qb2->getQuery()->getResult();

    $res['update'] = true;
    foreach($items as $key=> $item){
        $ts = $item->getUpdatedAt()->getTimestamp();
        if($ts > $res['last_ts']){
            $res['last_ts'] = $ts;
        }

        if($item->getSkip()){
            continue;
        }

        if($i < 4){
            $i++;
            /** @var \Main\Entity\Que\Que $item */
            $value = $item->toArray();
            $time = $value['time']->format("H:i");
            $red_bg = empty($value['remark'])? "": "red-background";
            $res['html'] .= <<<HTML
            <div class="que-list-ctx">
                <div class="row-fluid {$red_bg} que-ctx" style="margin-bottom: 6px;">
                    <div class="span1" style="padding: 10px 0 0 10px;">
                        <img src="http://placehold.it/100x100" >
                    </div>
                    <div class="span11 text-left"  style="padding: 5px 0;">
                        <p><strong>{$value['p_name']} {$value['p_surname']}</strong></p>
                        <p>{$value['remark']}</p>
                        <p>{$time}</p>
                    </div>
                </div>
            </div>
HTML;
        }
    }
    if($i>=4){
        $count = count($items)-4;
        $res['html'] .= <<<HTML
            <div class="row-fluid">
                <div class="span12 text-center muted-background" style="padding: 10px 0 0 10px;">
                    <h3 style="margin: 0;">มีต่ออีก {$count} คิว</h3>
                </div>
            </div>
HTML;
    }
    break;
}

echo json_encode($res);