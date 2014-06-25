<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/23/14
 * Time: 3:37 AM
 */

namespace Main\CTL;


class CallCTL extends BaseCTL {
    public function call(){
        $em = \Local::getEM();

        $call = new \Main\Entity\Que\CallDru();
        $call->setVnId($this->param['vn_id']);
        $call->setSuffixPath($this->param['suffix_path']);
        $call->setRoomPath($this->param['room_path']);

        $em->persist($call);
        $em->flush();

        return $call;
    }
}