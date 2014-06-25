<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/12/14
 * Time: 10:55 PM
 */

$vn_id = $_POST['vn_id'];
$suffix = $_POST['suffix_path'];
$room_path = $_POST['room_path'];
$room_name = $_POST['room_name'];
$em = Local::getEM();

$call = new \Main\Entity\Que\Call();
$call->setVnId($vn_id);
$call->setSuffixPath($suffix);
$call->setRoomPath($room_path);
$call->setRoomName($room_name);

$em->persist($call);
$em->flush();

echo json_encode(array('success'=> true));