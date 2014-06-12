<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/12/14
 * Time: 11:08 PM
 */


$last_id = isset($_GET['last_id'])? $_GET['last_id']: 0;

$em = Local::getEM();

if($ts == 0){
    $qb = $em->getRepository('Main\Entity\Que\CallDru')->createQueryBuilder('a');
    $qb->select('max(a.updated_at)');

    echo json_encode(array('last_id'=> $qb->getQuery()->getSingleScalarResult(), 'call'=> false));
}