<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:57 PM
 */

namespace Main\CTL;


class HideCTL extends BaseCTL {
    public function hide(){
        $em  = \Local::getEM();
        $item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $this->param['vn_id']));
        if(!is_null($item)){
            $item->setHide((bool)$this->param['hide']);
            $em->merge($item);
            $em->flush($item);
        }
        return $item;
    }
}