<?php
	setcookie('tableid', $_GET['tableID'],time()+ 3600);
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/order/?tableID=$_COOKIE["tableId"]');
	exit;
?>
Something is wrong with the XAMPP installation :-(
