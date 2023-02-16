<?php 
	//啟動session
	session_start();

	//清掉session紀錄
	session_unset();

	//返回首頁
	header('Location: index.php');
?>