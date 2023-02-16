
<?php
	session_start();

	$con = new mysqli("120.110.112.141","root","","ubuntu506");
   	$con->query("SET NAMES utf8");
   	$data=$con->query("SELECT * FROM record WHERE Record_ID = '".$_GET['id']."'") or die("NO");
   	$row = $data->fetch_assoc();

	header('Content-Type: text/html; charset=utf-8');
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	require("conn_mySQL.php");
	$sql_query_login="SELECT * FROM member where Email='$username' AND Password='$password'";
	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){
		header("Location:index.html");	
	}else{
		header("Location:index.html");
	}
	
	

?>