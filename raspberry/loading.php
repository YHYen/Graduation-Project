<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	  body {
	    -moz-user-select : none;
	    -webkit-user-select: none;
	  }
	 </style>
	<script type="text/javascript">
		window.addEventListener('contextmenu', function(e) { e.preventDefault(); });
		function iEsc(){ return false; }
		function iRec(){ return true; }
		function DisableKeys() {
		if(event.ctrlKey || event.shiftKey || event.altKey) {
			window.event.returnValue=false;
			iEsc();}
		}
		document.ondragstart=iEsc;
		document.onkeydown=DisableKeys;
		document.oncontextmenu=iEsc;
		if (typeof document.onselectstart !="undefined")
			document.onselectstart=iEsc;
		else{
			document.onmousedown=iEsc;
			document.onmouseup=iRec;
		}
		function DisableRightClick(qsyzDOTnet){
		if (window.Event){
			if (qsyzDOTnet.which == 2 || qsyzDOTnet.which == 3)
				iEsc();}
			else
			if (event.button == 2 || event.button == 3){
				event.cancelBubble = true
				event.returnValue = false;
				iEsc();
			}
		}
	</script>
	<title>Loading Bar</title>
	<link rel="stylesheet" href="loading.css">
</head>
<body bgcolor="#FFDDAA">
	<img src="lalu.jpg" style="display:block; margin:auto;"/>

	<div class="center">
		<div class="font">
			<font class="word">loading</font>
		</div>
		<div class="progress">
			<div class="fill a"></div>
		</div>
	</div>
</body>
</html>

<?php
	#辨識 & 移動檔案
	shell_exec("hello.sh");
	#
	
	#txt
	$con = new mysqli("120.110.112.141","root","","ubuntu506");
    $con->query("SET NAMES utf8");

	$meals = "";
	$Carbohydrate=0;
	$Protein=0;
	$Fat=0;
	$num=0;

	$f = fopen("result.txt","r");
	 fgets($f);
	 $arr = array();
	 while(! feof($f)){
	  $s = fgets($f);
	  $s = explode(":",$s);
	  $s = $s[0];
	  if (!array_key_exists($s,$arr)){
	    $arr[$s]=1;
	  }
	  else{
	    $arr[$s] = $arr[$s]+1;
	  }
	 }
	 foreach(array_keys($arr) as $i){
	 	$num++;
	  $meals = $meals.$i.":".$arr[$i]."-";
	  $data=$con->query("SELECT * FROM food WHERE Food_Name = '".$i."'") or die("123456");
	  $row=$data->fetch_assoc();
	  $Carbohydrate = $Carbohydrate+$row['Carbohydrate']*$arr[$i];
	  $Protein = $Protein+$row['Protein']*$arr[$i];
	  $Fat = $Fat+$row['Fat']*$arr[$i];
	  
	}
	 fclose($f);
	
	
	

	#資料庫
	
    $data=$con->query("SELECT * FROM record") or die("NO");
    $num = $data->num_rows;
    $pic = "http://140.128.18.90/sss/detectPicture/".($num+1).".png";
    #日期
    date_default_timezone_set("Asia/Shanghai");
	$date = date("Y-m-d");
	#時間
	$time = 1;
	if((int)date("h")>=11){
		$time = 2;
	}else if((int)date("h")>=17){
		$time = 3;
	}
	
    $ADD = "INSERT INTO record(Date, Time, Meals,Picture,Carbohydrate,Protein,Fat) VALUES ('".$date."','".$time."','".$meals."','".$pic."','".$Carbohydrate."','".$Protein."','".$Fat."')";

    $con->query($ADD) or die("QQQQQQQQ");
    
	header("Location:http://120.110.112.141/raspberry/table.php?id=".($num+1));

	
?>