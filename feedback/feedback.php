<?php 
	session_start();
 	header('Content-Type: text/html; charset=utf-8');
	
 	if($_SESSION['NoRect'] == TRUE) {
 		echo "<script>alert('警告：請拉框之後再送出');</script>";
 		$_SESSION['NoRect'] = FALSE;
 	}

 	//創建food array
	$meal = array("rice"=>0,"driedTofu"=>0,"steamedBread"=>0, "chickenLeg"=>0);
 
 	//連接資料庫
	require ("mysql_connect.inc.php");
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>手繪版</title>
	<link rel="stylesheet" type="text/css" href="css/Bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/Bootstrap.min.js">
	<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>
	<?php
		$con = new mysqli("120.110.112.141","root","","ubuntu506");
   		$con->query("SET NAMES utf8");
   		$data=$con->query("SELECT * FROM record WHERE Record_ID = '".$_SESSION['record_id']."'") or die("NO");
   		$row = $data->fetch_assoc();
   		
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-7">
				<svg id="svg" width="100%" height="180%" style="border:1px solid black;">
					<image xlink:href=<?php echo $row['Picture']; ?> x="0" y="0" width="100%" height="100%"/>
				</svg>
			</div>
			<div class="col-5">
				<form name="RecordPosition" id="myForm">
					<div>
						<div style="display: none;">
							左上
							<br>
							X座標：<input type="text" id="x1" name="x1" value="000" disabled="disabled">
							<br>
							Y座標：<input type="text" id="y1" name="y1" value="000" disabled="disabled">
							<br>
							右上
							<br>
							X座標：<input type="text" id="x2" name="x2" value="000" disabled="disabled">
							<br>
							Y座標：<input type="text" id="y2" name="y2" value="000" disabled="disabled">
							<br>
							左下
							<br>
							X座標：<input type="text" id="x3" name="x3" value="000" disabled="disabled">
							<br>
							Y座標：<input type="text" id="y3" name="y3" value="000" disabled="disabled">
							<br>
							右下
							<br>
							X座標：<input type="text" id="x4" name="x4" value="000" disabled="disabled">
							<br>
							Y座標：<input type="text" id="y4" name="y4" value="000" disabled="disabled">
							<br>
						</div>
						<!-- 放Table -->
						<table>
							<tr>
								<th>食物名稱</th>
								<th>份量</th>
							</tr>
							<?php 
								//取得當下的Meal資料
								$sql_query_count = "SELECT * FROM record";
								$result_meal = mysqli_query($db_link, $sql_query_count);
								//如果有讀到
								if($result_meal) {
									//取得當下資料筆數
									$num = mysqli_num_rows($result_meal);
									mysqli_data_seek($result_meal, $num-1);
									$row=mysqli_fetch_row($result_meal);
									// $row[4]是我要的資料	
								
							    	$array;
									if($row[4]!='') {
										$str = explode("-", substr($row[4], 0, -1));
										foreach (array_keys($str) as $i) {
											$food = explode(":", $str[$i]);
											foreach ($meal as $key => $value) {
												if($food[0] == $key) {
													$meal[$key]++;

												}
											}
										}
									}


									//讀取feedback資料表，把值取出來
									$sql_query_check = "SELECT * FROM feedback";
									$result_feedback = mysqli_query($db_link, $sql_query_check);
									//如果成功讀取
									if ($result_feedback) {
										$feedback = array(0, 0, 0, 0);
										while ($row = mysqli_fetch_array($result_feedback, MYSQLI_NUM)) {
										    $Classification = $row[1];
										    $feedback[$Classification]++;

										}
										for ($i=0; $i < count($feedback); $i++) { 
											$num = $feedback[$i];
											if($i==0){
												$meal["rice"] += $num;
											}
											if($i==1){
												$meal["driedTofu"]+= $num;
											}
											if($i==2){
												$meal["steamedBread"]+= $num;
											}
											if($i==3){
												$meal["chickenLeg"]+= $num;
											}
										}
									}

									foreach ($meal as $key => $value) {
										echo "<tr>";
										echo "<td>".$key."<td>";
										echo "<td>".$value."<td>";
										echo "<tr>";
									    	
									}

							       

								}else {
									echo "沒有讀到資料表";
								}

							?>
						</table>
						

						<!-- 類別 -->
						<select name="Classification" id="Classification">
							<option value="0">Rice</option>
							<option value="1">Dried Tofu</option>
							<option value="2">Steamed Bread</option>
							<option value="3">Chicken Leg</option>
						</select>
					</div>
					<div id="submit">
						<button type="submit" id="Cancel" formmethod="post" formaction="feedback.php">取消</button>
						<button type="submit" id="ToSQL" formmethod="post" formaction="ToSQL.php">送出</button>
						<button type="submit" id="Finish" formmethod="post" formaction="finish.php">完成</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
	



	<script type="text/javascript">
		var svg;
		window.onload=function() {
			svg=document.getElementById("svg");
			svg.addEventListener("mousedown", mousedownSvg);
			svg.addEventListener("touchstart", touchdownSvg);
		};

		function mousedownSvg(e) {
			//
			var x=e.clientX;
			var y=e.clientY;
			var bounding=this.getBoundingClientRect();
			x=x - bounding.left;
			y=y - bounding.top;
			var rect=createSvgElement("rect", {
				"x":x, "y":y, "width":0, "height":0, "stroke":"black", "stroke-width":3, "fill-opacity":0 
			});
			this.appendChild(rect);
			var drag=function(e) {
				rect.setAttribute("width", e.clientX-x);
				rect.setAttribute("height", e.clientY-y);
				//取得表單的值，並修改成座標值
				// 左上
				var x1 = document.getElementById('x1').value = x;
				var y1 = document.getElementById('y1').value = y;
				// 右上
				var x2 = document.getElementById('x2').value = e.clientX;
				var y2 = document.getElementById('y2').value = y;
				// 左下
				var x3 = document.getElementById('x3').value = x;
				var y3 = document.getElementById('y3').value = e.clientY;
				// 右下
				var x4 = document.getElementById('x4').value = e.clientX;
				var y4 = document.getElementById('y4').value = e.clientY;
			};
			var drop=function(e) {
				document.removeEventListener("mousemove", drag);
				document.removeEventListener("mouseup", drop);
			};
			document.addEventListener("mousemove", drag);
			document.addEventListener("mouseup", drop);
		}

		function touchdownSvg(e) {
			//
			var x=e.touches[0].clientX;
			var y=e.touches[0].clientY;
			var bounding=this.getBoundingClientRect();
			x=x - bounding.left;
			y=y - bounding.top;
			var rect=createSvgElement("rect", {
				"x":x, "y":y, "width":0, "height":0, "stroke":"black", "stroke-width":3, "fill-opacity":0 
			});
			this.appendChild(rect);
			var tdrag=function(e) {
				rect.setAttribute("width", e.touches[0].clientX-x);
				rect.setAttribute("height", e.touches[0].clientY-y);
				//取得表單的值，並修改成座標值
				// 左上
				var x1 = document.getElementById('x1').value = x;
				var y1 = document.getElementById('y1').value = y;
				// 右上
				var x2 = document.getElementById('x2').value = e.touches[0].clientX;
				var y2 = document.getElementById('y2').value = y;
				// 左下
				var x3 = document.getElementById('x3').value = x;
				var y3 = document.getElementById('y3').value = e.touches[0].clientY;
				// 右下
				var x4 = document.getElementById('x4').value = e.touches[0].clientX;
				var y4 = document.getElementById('y4').value = e.touches[0].clientY;
			};
			var tdrop=function(e) {
				document.removeEventListener("touchmove", tdrag);
				document.removeEventListener("touchend", tdrop);
			};
			document.addEventListener("touchmove", tdrag);
			document.addEventListener("touchend", tdrop);
		}

		function drawRect(x1, y1, width, height) {
			svg=document.getElementById("svg");
			var rect=createSvgElement("rect", {
				"x":x1, "y":y1, "width":width, "height":height, "stroke":"black", "stroke-width":3, "fill-opacity":0 
			});
			svg.appendChild(rect);
		}

		function createSvgElement(tagName, attrs) {
			var element=document.createElementNS("http://www.w3.org/2000/svg", tagName);
			for(var name in attrs) {
				element.setAttribute(name, attrs[name]);
			}
			return element;
		}

		
		//按下送出時，把Disable屬性取消
		$(document).ready(function(){
	      $("#ToSQL").click(function(){
	        $("input").prop("disabled", false);
	      });
	    });

	</script>
	<?php
		// 每次近來先檢查資料庫是否有資料，如果有就先把資料畫進去
		//檢查資料庫
		$sql_query_check = "SELECT * FROM feedback";
		$result = mysqli_query($db_link, $sql_query_check);

		if ($result) {
			//有幾筆資料
			$num = mysqli_num_rows($result);
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
			    $Classification = $row[1];
			    $x1 = $row[2];
			    $y1 = $row[3];
			    $x2 = $row[4];
			    $y3 = $row[7];
			    $width = $x2 - $x1;
			    $height = $y3 - $y1;
			    echo "<script type='text/javascript'> drawRect($x1, $y1, $width, $height); </script>";
			}

		}
		
	?>
</body>
</html>



<!-- 修正  去掉上一個動作，回復其他方框 -->