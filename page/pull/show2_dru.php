<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/6/14
 * Time: 3:22 AM
 */

$timeOut = 20;

$em = Local::getEM();
$vem = Local::getVEM();

$lastId = isset($_GET['last_ts'])? $_GET['last_ts']: 0;

$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->select('count(a)')
    ->where('a.updated_at > :updated_at')
    ->andWhere('a.dru = 1')
    ->setParameter('updated_at', date('Y-m-d H:i:s', $_GET['last_ts']));

$qb2 = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb2->where('a.dru = 1')
    ->andWhere('a.skip_dru=0')
    ->andWhere('a.hide=0')
    ->orderBy('a.time_dru');

$res = array('update'=> false);
$res['html'] = "";
$res['last_ts'] = $_GET['last_ts'];

$html = "";

$time = 0;
$i = 0;
while($time < $timeOut){
    if($qb->getQuery()->getSingleScalarResult()==0){
        sleep(3);
        $time += 3;
        continue;
    }

    $items = $qb2->getQuery()->getResult();

    $res['update'] = true;
    foreach($items as $key=> $item){
        $ts = $item->getUpdatedAt()->getTimestamp();
        if($ts > $res['last_ts']){
            $res['last_ts'] = $ts;
        }

        if($item->getSkipDru()){
            continue;
        }

        if($i < 10){
            $i++;
            /** @var \Main\Entity\Que\Que $item */
            $value = $item->toArray();
            $time = $value['time_dru']->format("H:i");
            $red_bg = empty($value['remark'])? "": "red-background-remark";
            $datetime = $value['date']->format('D M d Y')." ".$value['time_dru']->format('H:i:s');

            // count drug row
            try {
                $qb = $vem->getRepository('Main\Entity\View\QDrug')->createQueryBuilder('a');
                $drug_count = $qb->select('count(a)')
                    ->where("a.vn_id=:vn_id")
                    ->setParameter('vn_id', $item->getVnId())
                    ->getQuery()
                    ->getSingleScalarResult();
            }
            catch(Exception $e){
                $drug_count = 0;
            }

            $res['html'] .= <<<HTML
            <div class="row-fluid {$red_bg} que-ctx"  datetime="{$datetime}" style="padding-top: 10px;">
                <div class="span1" style="padding: 10px 0 0 10px; font-size: 24px;">
                    <!--<img src="http://placehold.it/100x100" >-->
                    {$i}
                </div>
                <div class="span11 text-left"  style="padding: 5px 0;">
                    <p style="font-size: 24px;"><strong>{$value['p_name']} {$value['p_surname']} ({$drug_count})</strong></p>
                    <p style="font-size: 20px;">{$value['remark']}</p>
                    <p style="font-size: 14px;">เวลา : {$time}</p>
                </div>
            </div>
HTML;
        }
    }
    if($i>=10){
        $count = count($items)-10;
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