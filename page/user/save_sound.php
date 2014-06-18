<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/11/14
 * Time: 4:17 PM
 */

/*
$des = 'public/sounds/doorbell.wav';
$doorbell = 'public/sounds/'.$_POST['doorbell'];
copy($doorbell, $des);
*/

$des = 'public/sounds/suffix.wav';
$doorbell = 'public/sounds/'.$_POST['suffix'];
copy($doorbell, $des);
?>
<meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER'];?>" />