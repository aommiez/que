<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/23/14
 * Time: 4:27 AM
 */

namespace Main\CTL;


class HideManyCTL extends BaseCTL {
    public function hideMany(){
        $dt = new \DateTime();
        $dt->sub(new \DateInterval('PT'.$this->param['minute'].'M'));

        $em  = \Local::getEM();
        $model = 'Main\Entity\Que\Que';
        $qb = $em->getRepository($model)->createQueryBuilder('a');
        $qb->where('a.time<=:time')
            ->andWhere('a.dru=1')
            ->andWhere('a.hide=0')
            ->setParameter('time', $dt->format('H:i:s'));

        $q = $qb->getQuery();
        $result = $q->getResult();

        $items = array();
        foreach($result as $item){
            /** @var \Main\Entity\Que\Que $item */
            if($item->getHide()){
                continue;
            }
            $item->setHide(true);
            $em->merge($item);
            $em->flush($item);
            $items[] = $item->toArray();
        }
        $items['ttt'] = $dt->format('H:i:s');
        return $items;
    }
} 