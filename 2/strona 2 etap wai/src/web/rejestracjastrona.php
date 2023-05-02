<?php
	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: formularz.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Portal zdjeć związanych z muzyką</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="desciption" content="Portal forografii muzycznych " />
	<link rel="stylesheet" href="lightbox.css">
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
		<script src="jquery-3.5.1.min.js"  ></script>
		<script src="jqueryui/jquery-ui.js" > </script>
		<script src="lightbox.js"></script>
</head>
<body >
		<header>
		 <div id="napis">
		Portal Fotografii Muzycznych
		</div>
		</header>
	<nav>
	<ol>
		<li ><a href="index.php" >Logowanie</a>
		<li ><a href="rejestracjastrona.php" >Rejestracja</a></li>
		<li ><a href="galeria.php" >Galeria</a></li>
		<li ><a href="formularz.php" >Upload</a></li>
	</ol>
	</nav>
	<main>
	<form action="rejestracja.php" method="post" enctype="multipart/form-data">
			Adres e-mail: <input type="text" name="mail"/> <br>
			Login: <input type="text" name="login"/> <br>
			Hasło: <input type="password" name="haslo"/> <br>
			Powtórz hasło: <input type="password" name="haslo2"/> <br>
			<input type="submit" value="Zarejestruj się" /> <br>
			</form>
			<div id="rejestr">Masz już konto? <a href="index.php">Zaloguj</a> <br></div>
			<?php
				if (isset ($_SESSION['ermail'])){
					echo $_SESSION['ermail'].'<br>';
				}
				if (isset ($_SESSION['erlogin'])){
					echo $_SESSION['erlogin'].'<br>';
				}
				if (isset ($_SESSION['erhaslo'])){
					echo $_SESSION['erhaslo'].'<br>';
				}
				if (isset ($_SESSION['rejestracjapom'])){
					echo $_SESSION['rejestracjapom'].'<br>';
				}
			?>
	</main>
		<footer>
		Projekt 2020, Jakub Kwiatkowski , 184348
		</footer>
</body>
</html>