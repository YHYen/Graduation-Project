<!-- 這是移除最後一個 -->
<?php 
	session_start();

	header('Content-Type: text/html; charset=utf-8');
	

	//連接資料庫
	require ("mysql_connect.inc.php");

	//把資料庫中ID+1，用以幫txt文檔取名
	$sql_query_count = "SELECT * FROM Count";
	$result_count = mysqli_query($db_link, $sql_query_count);
	$count = 1;
	if($result_count) {
		$row = mysqli_fetch_array($result_count, MYSQLI_NUM);
		$count = $row[0];
	}

	//讀取feedback資料表，把值取出來
	$sql_query_check = "SELECT * FROM feedback";
	$result_feedback = mysqli_query($db_link, $sql_query_check);

		if ($result_feedback) {
			$mycontent = '';
			while ($row = mysqli_fetch_array($result_feedback, MYSQLI_NUM)) {
			    $Classification = $row[1];
			    $x1 = $row[2];
			    $y1 = $row[3];
			    $x2 = $row[4];
			    $y3 = $row[7];
			    $width = $x2 - $x1;
			    $height = $y3 - $y1;

			    //計算比例
			    //x = (xmin + (xmax-xmin)/2) * 1.0 / image_w
			    $X = ($x1 + $width/2) * 1.0 / 2592;
			    //y = (ymin + (ymax-ymin)/2) * 1.0 / image_h
			    $Y = ($y1 + $height/2) * 1.0 / 1944;
			    //w = (xmax-xmin) * 1.0 / image_w
			    $W = $width * 1.0 / 2592;
			    //h = (ymax-ymin) * 1.0 / image_h
			    $H = $height * 1.0 / 1944;
			    
			    $mycontent = $mycontent.$Classification.' '.$X.' '.$Y.' '.$W.' '.$H."\r\n";

			}

			//將資料表資料輸出成txt檔案
			$getfilename = 'C:\\xampp\\htdocs\\feedback\\'.$count.'.txt'; //設定你的檔案寫路路徑。請依照主機路徑為主 
			if(@$fp = fopen($getfilename, 'w+')) 
			    { 
			        //更新原資料記錄表 
			        fwrite($fp, $mycontent); 
			        fclose($fp); 
			        $msg = '檔案建立完成'; 
			        $count++;
			        $sql_query_update = "UPDATE Count SET ID = " .$count;
			        $result_update = mysqli_query($db_link, $sql_query_update) or die("失敗!");
			    } 
			    else 
			    { 
			        $msg = '檔案建立失敗，請確定該目錄是否有可寫權限'; 
			    } 
			echo $msg;

		}
	

	//刪除所有資料
	$sql_data_delete = "DELETE FROM feedback";
	if (mysqli_query($db_link, $sql_data_delete)) {
		echo "刪除成功";
		header('Location: http://120.110.112.141/raspberry/QR_Code.php');
	}
	else {
		echo "刪除失敗";
	}

?>