<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/23/14
 * Time: 1:32 AM
 */

namespace Main\CTL;


class ShowCTL extends BaseCTL {
    public function show(){
        $em = \Local::getEM();
        $vem = \Local::getVEM();

        $qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
        $qb->where('a.dru = 1')
            ->andWhere('a.skip_dru=0')
            ->andWhere('a.hide=0')
            ->orderBy('a.time_dru');

        $q = $qb->getQuery();
        $items = $q->getResult();

        $res = array('html'=> '');
        $i = 0;
        foreach($items as $key=> $item){
            /** @var \Main\Entity\Que\Que $item */
            if($i < 10){
                $i++;
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
                catch(\Exception $e){
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

        $q->free();
        return $res;
    }
}