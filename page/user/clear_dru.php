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

$dt = new DateTime();
$dt->sub(new DateInterval('PT'.$minute.'M'));

$em = Local::getEM();
//$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$model = 'Main\Entity\Que\Que';
$q = $em->createQuery("UPDATE {$model} a SET a.hide=1, a.updated_at=:updated_at WHERE a.time_dru<=:time AND a.dru=1 AND a.hide=0");
$q->setParameter('time', $dt->format('H:i:s'))
    ->setParameter('updated_at', date('Y-m-d H:i:s'));
/*
$q = $qb
    ->update('Main\Entity\Que\Que', 'a')
    ->set('a.skip_dru', true)
    ->set('a.updated_at', "'".date('Y-m-d H:i:s')."'")
    //->where('a.date<:date')
    //->orWhere('a.time<=:time')
    ->where('a.time<=:time')
    ->andWhere("a.dru=1")
    //->setParameter('date', $dt->format('Y-m-d'))
    ->setParameter('time', $dt->format('H:i:s'))
    ->getQuery();
*/
/*
echo $q->getDQL();
$param = array(
    'time'=> $dt->format('H:i:s'),
    'updated_at'=> date('Y-m-d H:i:s')
);
var_dump($param);
exit();
$q->execute();
exit();
*/
$q->getResult();
?>
<meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER'];?>" />