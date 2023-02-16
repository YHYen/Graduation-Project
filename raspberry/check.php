<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align: center;" bgcolor="#FFC0CB">
	<?php
		$con = new mysqli("120.110.112.141","root","","ubuntu506");
	   	$con->query("SET NAMES utf8");
	   	$data=$con->query("SELECT * FROM record WHERE Record_ID = '".$_GET['id']."'") or die("NO");
	   	$num=$data->num_rows;
	   	if($num=0){
	   		echo "<font size=10>沒有這筆資料!</font>";
	   	}else{
	   		$UPD = "UPDATE record SET memberID= 1 WHERE Record_ID ='".$_GET['id']."'"; 
	   		if($con->query($UPD)){
	   			echo "<font size=10>資料認證成功!</font>";
	   		}else{
	   			echo "<font size=10>資料認證失敗!</font>";
	   		}
	   	}
	?>
</body>
</html>