<?php
	session_start();
	$_SESSION['NoRect']=false;
	$_SESSION['record_id']=$_GET['id'];
?>
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
	<title></title>
	<link rel="stylesheet" href="table.css">
	
</head>
<body bgcolor="#FFC0CB">
	<div class="left">
		<?php
			$con = new mysqli("120.110.112.141","root","","ubuntu506");
   			$con->query("SET NAMES utf8");
   			$data=$con->query("SELECT * FROM record WHERE Record_ID = '".$_GET['id']."'") or die("NO");
   			$row = $data->fetch_assoc();
   			$id = $_GET['id'];
   			echo "<img width=360px height=360px src=".$row['Picture'].">";
		?>
		
	</div>
	<div class="right top">
		<table>
			<tr>
				<th>食物名稱</th>
				<th>份量</th>
			</tr>
			<?php
				$cnt=0;
				$array;

				
   				if(!$row['Meals']==""){
   					$s = explode("-",substr($row['Meals'],0,-1));
	   				foreach(array_keys($s) as $i){
		 				$cnt++;
		 				$food = explode(":",$s[$i]);
		 				echo "<tr>";
						echo "<td>".$food[0]."</td>";
						echo "<td>".$food[1]."</td>";
						echo "</tr>";
		 			}
   				}

				for ($i=$cnt; $i < 5 ; $i++) { 
					# code...
					echo "<tr>
							<td><font color = #FFC0CB>123</font></td>
							<td><font color = #FFC0CB>123</font></td>
						</tr>";
				}
			?>
		</table>  
	</div>
	
	<div class="right end">
		<button class="button2" <?php echo "onclick=javascript:location.href='http://120.110.112.141/feedback/feedback.php'"; ?>>校正</button>
		<?php
			echo "<button class=button2 onclick=javascript:location.href='QR_Code.php?id=$id'>確定</button>";
		?>
	</div>
</body>
</html>

