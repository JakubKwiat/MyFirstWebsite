<?php
	session_start();
	require_once 'functions.php';
	$db = get_db();
	$zdjecia = $db->zdjecia->find();
	$i=0;
		foreach ($zdjecia as $zdjecieinfo) {
				$tytul = $zdjecieinfo['tytul'];
				if(isset($_POST[$tytul])){
					if($_POST[$tytul]=='on'){
						unset($_SESSION[$tytul]);
						$_SESSION['i']=$_SESSION['i']-1;
			}
			}	
		}
	header('Location: galeria.php');
?>