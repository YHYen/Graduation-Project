<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	//接收使用者註冊資訊
	$account = $_SESSION['account'];
	$password = $_SESSION['password'];	
	$Diet_Plan = (int)$_POST['diet_plan'];

	//連接資料庫
	require ("mysql_connect.inc.php");
	
	//將Diet_Plan寫入資料庫
	$sql_data_onload = "UPDATE member SET Diet_Plan= '$Diet_Plan' WHERE Email = '$account'";
	//檢查是否寫入成功
	$result = mysqli_query($db_link, $sql_data_onload) or die("失敗");

	header('Location:index.php');
?>