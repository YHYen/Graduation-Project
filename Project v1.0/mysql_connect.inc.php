<?php 
	header('Content-Type: text/html; charset=utf-8');
	$db_link=@mysqli_connect("127.0.0.1", "root", "");
	if(!$db_link) {
		die("資料庫連結失敗<br>");
	}else {
		
	}

	mysqli_query($db_link, "SET NAMES 'utf-8'");

	$seldb=@mysqli_select_db($db_link, "ubuntu506");
	if (!$seldb) {
		die("資料庫名稱錯誤<br>");
	}else {
		
	}

?>