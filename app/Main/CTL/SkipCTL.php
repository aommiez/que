<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:57 PM
 */

namespace Main\CTL;


class SkipCTL extends BaseCTL {
    public function skip(){
        $em  = \Local::getEM();
        $item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $this->param['vn_id']));
        if(!is_null($item)){
            $item->setSkipDru(true);
            $em->merge($item);
            $em->flush($item);
        }
        return $item;
    }
} 