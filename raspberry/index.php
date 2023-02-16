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
	</head>
	<body style="margin: 0;padding: 0;">
		<img src="ranbowCat.gif" style="width: 100%;height: 100%;" onclick="location.href='preview.php'">
	</body>
</html>