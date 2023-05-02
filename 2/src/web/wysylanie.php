<?php
	session_start();

	 require_once 'functions.php';
	
	$db = get_db();
	
	$zdjecie = $_FILES['zdjecie'];
	
	$upload_dir= '/var/www/prod/src/web/upload/';
	
	$file = $_FILES['zdjecie'];
	$file_name= basename($file['name']);
	
	$target = $upload_dir. $file_name;
	$tmp_path= $file['tmp_name'];
	$file_size = $file['size'];
														//sprawdzanie typu i rozmiaru
	$finfo= finfo_open(FILEINFO_MIME_TYPE);
	$file_name= $_FILES['zdjecie']['tmp_name'];
	$mime_type= finfo_file($finfo, $file_name);
	if ($mime_type!== 'image/jpeg' && $mime_type!== 'image/png'){
		$e_format="Rozszerzenie niedozwolone. <br>";
		$_SESSION['e_format'] = $e_format;
		header('Location: formularz.php');
	}
	
	if($file_size > 1048576){
              $e_size="Plik nie może być większy niż 1 MB. <br>";
			  $_SESSION['e_size'] = $e_size;
			  header('Location: formularz.php');
    }
														//przesylanie zdjecia
	if(!isset($e_size) && !isset($e_format)){
		$przeslano = 'tak';
		$_SESSION['przeslano'] = $przeslano;
		$autor = $_POST['autor'];
		$tytul = $_POST['tytul'];
		$zdjecieinfo =[
			'autor' => $autor,
			'tytul' => $tytul,
		];
	$db->zdjecia->insertOne($zdjecieinfo);
	move_uploaded_file($tmp_path, $target);
	}
	
	$path_parts = pathinfo("/var/www/prod/src/web/upload/".$file['name']);
		
	if ($path_parts['extension']=='jpg'){
	$img = imagecreatefromjpeg("/var/www/prod/src/web/upload/".$file['name']);
	}	
	if ($path_parts['extension']=='jpeg'){
	$img = imagecreatefromjpeg("/var/www/prod/src/web/upload/".$file['name']);
	}		
	if ($path_parts['extension']=='png'){
	$img = imagecreatefrompng("/var/www/prod/src/web/upload/".$file['name']);
	}																						
	$width  = imagesx($img);
	$height = imagesy($img);
	
	$width_mini = 200;
	$height_mini = 125;
	$img_mini = imagecreatetruecolor($width_mini, $height_mini);
	
	imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);

	imagejpeg($img_mini, "/var/www/prod/src/web/upload/miniaturki/".$file['name'],80);
	
	imagedestroy($img_mini);
	imagedestroy($img);
	
	$znakwodny = $_POST['znakwodny'];
	if ($path_parts['extension']=='jpg'){
	$img = imagecreatefromjpeg("/var/www/prod/src/web/upload/".$file['name']);
	}	
	if ($path_parts['extension']=='jpeg'){
	$img = imagecreatefromjpeg("/var/www/prod/src/web/upload/".$file['name']);
	}		
	if ($path_parts['extension']=='png'){
	$img = imagecreatefrompng("/var/www/prod/src/web/upload/".$file['name']);
	}	
	$data = getimagesize("/var/www/prod/src/web/upload/".$file['name']);
	$imgwidth = $data[0];
	$imgheight = $data[1];
	$stampwidth = $imgwidth / 5;
	$stampheight = $imgheight / 10;
	
	$stamp = imagecreatetruecolor($stampwidth, $stampheight);
	imagefilledrectangle($stamp, 0, 0, $stampwidth - 1, $stampheight - 1, 0x0000FF);
	imagestring($stamp, 5, 10, 5, $znakwodny, 0xFFFFFF);
	
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	
	imagecopymerge($img, $stamp, imagesx($img) - $sx - $marge_right, imagesy($img) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);
	
	
	imagejpeg($img,"/var/www/prod/src/web/upload/znakwodny/".$file['name']);
	imagedestroy($img);

	rename("/var/www/prod/src/web/upload/".$file['name'],"/var/www/prod/src/web/upload/".$tytul."."."jpg");			
	rename("/var/www/prod/src/web/upload/miniaturki/".$file['name'],"/var/www/prod/src/web/upload/miniaturki/".$tytul."."."jpg");
	rename("/var/www/prod/src/web/upload/znakwodny/".$file['name'],"/var/www/prod/src/web/upload/znakwodny/".$tytul."."."jpg");	

	header('Location: formularz.php');

?>
	