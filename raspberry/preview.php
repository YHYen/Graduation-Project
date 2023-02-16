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
	<link rel="stylesheet" href="preview.css">
	
</head>
<body bgcolor="#FFC0CB">
	<div class="left">
		<font color="#FFC0CB">　</font>
	</div>
	<div class="right top">
		<font color="#FFC0CB">　</font>  
	</div>
	<div class="right mid">
		<font class="word">預覽畫面</font>
	</div>
	<div class="right end">
		<button class="button" onclick="javascript:location.href='shot.php'">拍攝</button>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
      function upload(){
        $.ajax({
          url:'preview_sh.php',
          type:"get",
          data:"",
          dataType:"json",
          beforeSend:function(XMLHttpRequest){
            console.log("正在傳送中");
          },
          success:function(data){
              
          },
          complete:function(XMLHttpRequest,textStatus){
              
          },
          error:function(XMLHttpRequest, textStatus){
              
          }
        });
      }
      
          
    upload();
          
    
    </script>