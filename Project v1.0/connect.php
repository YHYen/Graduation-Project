<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	//接收使用者帳號密碼
	$account = $_POST['account'];
	$password = $_POST['password'];	


	require ("mysql_connect.inc.php");
	//搜索資料庫資料
	$sql_query_login = "SELECT * FROM member where Email = '$account' AND Password='$password'";
	$result = mysqli_query($db_link, $sql_query_login) or die("查詢失敗");
	//判斷帳號密碼是否空白或錯誤
	if(mysqli_num_rows($result)) {
		//記錄使用者登入成功
		$_SESSION['is_login'] = true;
		$_SESSION['account'] = $account;
		$_SESSION['password'] = $password;
		//跳轉已登入頁面 already.html
		header('Location: index.php');
	}
	else {
		$_SESSION['is_login'] = false;
		echo $_SESSION['is_login'];
		echo "登入失敗";
		header('Location: index.php');
	}
?>