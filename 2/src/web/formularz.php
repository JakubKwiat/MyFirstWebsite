<?php
	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>UPLOAD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="desciption" content="Portal forografii muzycznych " />
    <link rel="stylesheet" href="formularz.css" />
	<link rel="stylesheet" href="jqueryui/jquery-ui.css" />
	<link rel="stylesheet" href="jqueryui/jquery-ui.structure.css" />
	<link rel="stylesheet" href="jqueryui/jquery-ui.theme.css" />
</head>
<body>
<header>
		WYSLIJ FOTO
</header>
<nav>
	<ol>
		<li ><a href="galeria.php" >Galeria</a></li>
		<li ><a href="formularz.php" >Upload</a></li>
	</ol>
	</nav>
<main>
				<?php
					echo"<p><h1>Zalogowano , Witaj ".$_SESSION['login'].'!<a href="wylogowanie.php">Wyloguj się</h1></a></p>';
				?>	
					<form action="wysylanie.php" method="post" enctype="multipart/form-data">
					Tytul: <input type="text" name="tytul" required/><br>
					Autor<input type="text" name="autor" required/><br>
					Znak wodny: <input type="text" name="znakwodny"  required/> <br>
					Zdjęcie: <input type="file" name="zdjecie" required/> <br>
					
					<input type="submit" value="Wyślij"/>
					</form>
					 <!--<form action="czyszczenie.php" method="post" enctype="multipart/form-data">
					<input type="submit" value="wyczyść galerię"/> 
					</form>
					-->
					<?php
					if (isset($_SESSION['e_format'])){ 
					echo $_SESSION['e_format'];
					unset($_SESSION['e_format']);
					$blad = 'tak';
					}
					if (isset($_SESSION['e_size'])){ 
					echo $_SESSION['e_size'];
					unset($_SESSION['e_size']);
					$blad = 'tak';
					}
					if(!isset($blad) && isset($_SESSION['przeslano'])){
						echo "plik przesłany pomyślnie!";
						unset($_SESSION['przeslano']);
					}
					unset($blad);
				?>
				<br> <div id="galeria"><a href="galeria.php">Galeria</a>
				</div>	
	</main>			
				<footer>
		Projekt 2020, Jakub Kwiatkowski , 184348
		</footer>
</body>
</html>