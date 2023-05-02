<?php
	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();
	
	unset($_SESSION['ermail']);
	unset($_SESSION['erlogin']);
	unset($_SESSION['erhaslo']);
	unset($_SESSION['rejestracjapom']);
	
	$mail = $_POST['mail'];
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$haslo2 = $_POST['haslo2'];
	$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
	
	
	$querylogin = [
		'login' => $login,
	];
	$erlogin = $db->users->findOne($querylogin);
	
	if (isset ($erlogin)){
		$_SESSION['erlogin']='Istnieje już użytkownik o takim loginie!';
	}
	if($_POST['login']==''){
		$erlogin = true;
		$_SESSION['erlogin']='Login nie może być pusty!';
	}
	
	$querymail = [
		'mail' => $mail,
	];
	$ermail = $db->users->findOne($querymail);
	
	if (isset ($ermail)){
		$_SESSION['ermail']='Istnieje już użytkownik o takim mailu!';
	}
	if($_POST['mail']==''){
		$ermail = true;
		$_SESSION['ermail']='Mail nie może być pusty!';
	}
	if ($haslo != $haslo2){
		$_SESSION['erhaslo']='Hasła nie są identyczne!';
		$erhaslo = true;
	}
	if($_POST['haslo']=='' || $_POST['haslo2']==''){
		$erhaslo = true;
		$_SESSION['erhaslo']='Hasło nie może być puste!';
	}
	if (!isset ($erlogin) && !isset ($erhaslo) && !isset ($ermail)){
		$user =[
			'login' => $login,
			'haslo' => $haslo_hash,
			'mail' => $mail,
		];
		$db->users->insertOne($user);
		$_SESSION['rejestracjapom']='Rejestracja zakończona sukcesem!';
	}
	header('Location: rejestracjastrona.php');
?>