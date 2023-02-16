<?php 
	header('Content-Type: text/html; charset=utf-8');

	//連接資料庫
	require ("mysql_connect.inc.php");

	//創建food array
	$meal = array("rice"=>0,"driedTofu"=>0,"steamedBread"=>0, "chickenLeg"=>0);

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
		
		$cnt=0;
    	$array;
		if($row[4]!='') {
			$str = explode("-", substr($row[4], 0, -1));
			foreach (array_keys($str) as $i) {
				$cnt++;
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



		var_dump($meal);

       

	}else {
		echo "沒有讀到資料表";
	}


	
?>

    