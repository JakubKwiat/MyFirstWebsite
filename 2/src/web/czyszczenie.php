<?php
	session_start();              
	
	require_once 'functions.php';
	
	$db = get_db();
	$db->zdjecia->drop();
	
	header('Location: formularz.php');
?>