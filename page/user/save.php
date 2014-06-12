<?php 
if (!$_SESSION['user']) {
	header('Location: index.php?page=user/logout&noTemp=true');
	exit;
}

$id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0 ;

$em = Local::getEM();

// Edit
if ($id > 0) {

	$user = $em->find('Main\Entity\Que\User', $id);
	$user->setName($_POST['username']);
	$user->setEmail($_POST['email']);

	if (!empty($_POST['password'])) {
		$password = hash('sha256', $_POST['password']);
		$user->setPassword($password);
	}
	$em->flush();

// Add
}else{
	$data['password'] = hash('sha256', $_POST['password']);

	$user = new Main\Entity\Que\User();
	$user->setName($_POST['username']);
	$user->setEmail($_POST['email']);
	$user->setLevel(1);
	$password = hash('sha256', $_POST['password']);
	$user->setPassword($password);

	$em->persist($user);
	$em->flush();
}

header('Location: index.php?page=user/list');