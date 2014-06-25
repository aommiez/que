<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/23/14
 * Time: 2:51 AM
 */

namespace Main\CTL;


class InitCTL extends BaseCTL {
    public function init($param = array()){
        parent::init($param);
        return $this->action();
    }

    public function action(){
        $em = \Local::getEM();
        $qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
        $qb->where('a.skip_dru=0')
            ->andWhere('a.dru=1')
            ->orderBy('a.time_dru');

        $query = $qb->getQuery();
        $results = $query->getResult();

        $items = array();
        foreach($results as $q){
            /** @var \Main\Entity\Que\Que $q */
            $items[] = $q->toArray();
            unset($q);
        }
        $query->free();
        unset($qb);
        return $items;
    }
}