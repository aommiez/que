<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/11/14
 * Time: 4:17 PM
 */

$minute = 30;
if(isset($_GET['minute'])){
    $minute = $_GET['minute'];
}

$em = Local::getEM();
$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');

$qb->where("a.skip_dru=0")->andWhere("a.dru=1")->andWhere('a.time');