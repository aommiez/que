<?php
if (isset($_SESSION['user'])) {
    ?>
    <meta http-equiv="Refresh" content="0; url=index.php?page=department/list">
    <?php
    exit;
}

$em = Local::getEM();
$email = !is_null($_POST['email']) ? $_POST['email'] : null ;
$password = !is_null($_POST['password']) ? $_POST['password'] : null ;
$user = $em->getRepository('Main\Entity\Que\User')->findOneBy(array(
	'email' => $email,
	'password' => hash('sha256', $password),
));

if($user!==null){
	$_SESSION['user'] = array(
		'id' => $user->getId(),
		'name' => $user->getName(),
		'email' => $user->getEmail(),
		'level' => $user->getLevel(),
	);
	header('Location: index.php?page=department/list');
}else{
	@header('Location: index.php?page=user/logout&noTemp=true');
}