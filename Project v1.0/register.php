<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	//接收使用者註冊資訊
	$account = $_POST['account'];
	$password = $_POST['password'];	
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$birthday = str_replace('/', '-', $_POST['birthday']);
	$gender = $_POST['gender'];
	$sport_stage = $_POST['sport_stage'];
	$username  = $_POST['username'];

	$Birthday = $birthday[6].$birthday[7].$birthday[8].$birthday[9].'-'.$birthday[3].$birthday[4].'-'.$birthday[0].$birthday[1];


	//連接資料庫
	require ("mysql_connect.inc.php");
	
	//判斷帳號是否已存在
	$sql_account_check = "SELECT * FROM member where Email = '$account'";
	$result = mysqli_query($db_link, $sql_account_check);
	if(mysqli_num_rows($result) == true) {
		echo "<script>alert('警告：您的信箱已註冊');location.href = 'register.html'</script>";

	}
	else {
		//將數據寫入資料庫
		$sql_data_onload = "insert into member (Name, Email, Password, Height, Weight, Birthday, Gender, Sport_Stage) values ('$username', '$account', '$password', '$height', '$weight', '$Birthday', '$gender', '$sport_stage')";

		//檢查是否寫入成功
		if (mysqli_query($db_link, $sql_data_onload)) {
			echo "新增成功";
			$_SESSION['is_login'] = true;
			$_SESSION['account'] = $account;
			$_SESSION['password'] = $password;

			header('Location: DietPlan.php');
		}
		else {
			echo "新增失敗";
			header('Location: register.html');
		}
	}
?>