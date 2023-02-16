
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="QR_Code.css">
</head>
<body>
	<?php
		include "./phpqrcode/phpqrcode.php";
		QRcode::png("http://120.110.112.141/Project v1.0/portfolio.php",'testQR.png',QR_ECLEVEL_L, 10); 
	?>
	<div class="top"><img src="testQR.png" width="300px" height="300px"></div>
	
	<div class="end"><button style="padding: 10px 45px;font-size: 25px;" onclick="javascript:location.href='http://127.0.0.1/index.php'"> 回到首頁 </button></div>
</body>
</html>