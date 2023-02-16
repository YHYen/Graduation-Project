<?php 
	shell_exec("/var/www/html/takePicture.sh");
	shell_exec("/var/www/html/pictureTransport.sh");
	header("Location:http://140.128.18.90/sss/loading.php");
?>