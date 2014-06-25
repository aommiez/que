<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:57 PM
 */

namespace Main\CTL;


class RemarkCTL extends BaseCTL {
    public function remark(){
        $em  = \Local::getEM();
        $item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id'=> $this->param['vn_id']));

        $remark = "";
        if(isset($this->param['remark'])) $remark = $this->param['remark'];
        if(!is_null($item)){
            $item->setRemark($remark);
            $em->merge($item);
            $em->flush();
        }
        return $item;
    }
}