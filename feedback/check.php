<?php
		// 每次近來先檢查資料庫是否有資料，如果有就先把資料畫進去

		//連接資料庫
		require ("mysql_connect.inc.php");

		//檢查資料庫
		$sql_query_check = "SELECT * FROM feedback";
		$result = mysqli_query($db_link, $sql_query_check);

		if ($result) {
			//有幾筆資料
			$num = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			printf("第 %s 筆資料 : %s<br>", $row[0], $row[6]);

		}
		
	?>