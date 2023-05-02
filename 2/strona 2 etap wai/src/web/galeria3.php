<?php
	session_start();
	
	require_once 'functions.php';
	
	$db = get_db();
	
	$liczba_zdj = 0;
			$katalog = "upload/znakwodny";
			$katalogminiaturki = "upload/miniaturki";	
			$strona = 3;
			$rozmiarStrony = 5;
			$opts = [
				'skip' => ($strona - 1) * $rozmiarStrony,
				'limit' => $rozmiarStrony
			];
			$zdjecia = $db->zdjecia->find([], $opts);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Galeria</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="desciption" content="Portal forografii muzycznych" />
	<link rel="stylesheet" href="lightbox.css">
	<link rel="stylesheet" href="galeria.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
	<link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
</head>
<body >
		<header>
		 <div id="napis">
			Galeria
		</div>
		</header>
		<ol>
		<li ><a href="index.php" >Logowanie</a>
		<li ><a href="rejestracjastrona.php" >Rejestracja</a></li>
		<li ><a href="galeria.php" >Galeria</a></li>
		<li ><a href="formularz.php" >Upload</a></li>
	</ol>
	<main>
	<div id="tresc">
			<?php
			
			foreach ($zdjecia as $zdjecieinfo){
				$tytul = $zdjecieinfo['tytul'];
				$autor = $zdjecieinfo['autor'];
				echo '<div class="mojagal"><a href="'.$katalog.'/'.$tytul."."."jpg".'" title="Zdjęcie: '.$tytul."."."jpg".'"><img src="'.$katalogminiaturki.'/'.$tytul."."."jpg".'" alt="Zdjęcie: '.$tytul."."."jpg".'" /></a>';
				echo '<div class="info">tytuł: '.$tytul.'</div>';
				echo '<div class="info">autor: '.$autor.'</div>';
				echo '<form action="ulubione.php" method="post" enctype="multipart/form-data">'.'<input type="checkbox" name="'.$tytul.'"';
				echo'</br>';
				echo '</div>';
				$liczba_zdj= $liczba_zdj+1;
			}
			echo'<div style="clear:both;"></div>';
			if($liczba_zdj>0){
			echo '<input type="submit" value="Zapisz do ulubionych" />'.'</form>'.'</br>';
			}
			?>
			</div>
			</form>
	<div id="wybor">
	Strona
	</div>
<div class="strony">
		<a href="galeria.php" >1</a>
		<a href="galeria2.php" >2</a>
		<a href="galeria3.php" >3</a>
		<a href="galeria4.php" >4</a>
		<a href="galeria5.php" >5</a>
		<a href="galeriaulubione.php">Ulubione </a>
</div>
	</main>
		<footer>
		Projekt 2020, Jakub Kwiatkowski , 184348
		</footer>
</body>
</html>