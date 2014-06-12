<?php
/*
if ($_SESSION['user']['level'] < 99) {
    header('Location: index.php?page=user/list');
    exit;
}
*/

$id = isset($_GET['id']) ? intval($_GET['id']) : 0 ;
$em = Local::getEM();
$user = $em->find('Main\Entity\Que\User', $id);

//if ( $_SESSION['user']['id'] !== $user->getId() ) {
    $em->remove($user);
    $em->flush();
    $em->clear();
//}

?>
<meta http-equiv="refresh" content="0; url=index.php?page=user/list" />