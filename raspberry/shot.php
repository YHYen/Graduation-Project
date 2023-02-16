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
	<meta http-equiv=REFRESH CONTENT=1;url=shot_sh.php>
</body>
</html>


