<!-- 這是把座標資料放到資料庫德PHP，只做放入和提出，不移除資料 -->
<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	//接收所有座標點
	$Classification = $_POST['Classification'];
	$x1 = $_POST['x1'];
	$y1 = $_POST['y1'];	
	$x2 = $_POST['x2'];
	$y2 = $_POST['y2'];	
	$x3 = $_POST['x3'];
	$y3 = $_POST['y3'];	
	$x4 = $_POST['x4'];
	$y4 = $_POST['y4'];	
	$width = $x2 - $x1;
	$height = $y3 - $y1;
	//連接資料庫
	require ("mysql_connect.inc.php");


	//如果數值皆為0，alert請使用者要拉框

	if($width==0 && $height==0) {
		$_SESSION['NoRect'] = TRUE;
		header('Location: feedback.php');
	}else {
		$sql_data_onload = "INSERT into feedback (Classification, x1, y1, x2, y2, x3, y3, x4, y4) values ('$Classification', '$x1', '$y1', '$x2', '$y2', '$x3', '$y3', '$x4', '$y4')";
		if (mysqli_query($db_link, $sql_data_onload)) {
			echo "新增成功";
			header('Location: feedback.php');

		}
		else {
			echo "新增失敗";
		}
	}
?>