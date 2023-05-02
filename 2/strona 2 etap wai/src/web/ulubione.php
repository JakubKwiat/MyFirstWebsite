<?php

	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();
	$zdjecia = $db->zdjecia->find();
	
	foreach ($zdjecia as $zdjecieinfo) {
				$tytul = $zdjecieinfo['tytul'];
				$autor = $zdjecieinfo['autor'];
				if (isset ($_POST[$tytul])){
				if ($_POST[$tytul]=='on'){
					$_SESSION[$tytul]=$tytul;
				}
				}
	}
	header('Location: galeria.php');
?>