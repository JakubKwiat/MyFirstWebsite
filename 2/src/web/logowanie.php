<?php
	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();

	
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	
	$query = [
		'login' => $login,
	];
	$user = $db->users->findOne($query);
	
	
	if (isset ($user) && password_verify ($haslo ,$user['haslo'])){
		$_SESSION['zalogowany']=true;
		$_SESSION['login']=$login;
		header('Location: index.php');
	}
	else {
		$_SESSION['zalogowany']=false;
		header('Location: index.php');
		$_SESSION['erlogowania']='Login i hasło nie pasują, spróbuj jeszcze raz.';
	}
?>