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
$dt->add(new DateInterval('PT'.$minute.'M'));

$em = Local::getEM();
$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');

$q = $qb
    ->update('Main\Entity\Que\Que', 'a')
    ->set('a.skip_dru', true)
    ->set('a.updated_at', "'".date('Y-m-d H:i:s')."'")
    ->where('a.date<=:date')
    ->orWhere('a.time<=:time')
    ->andWhere("a.dru=1")
    ->setParameter('date', $dt->format('Y-m-d'))
    ->setParameter('time', $dt->format('H:i:s'))
    ->getQuery();

$q->execute();
?>
<meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER'];?>" />