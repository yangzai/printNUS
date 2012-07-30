<html>
<head>
<title>the title</title>
   <script type="text/javascript" 
   src="/jquery/jquery-1.3.2.min.js"></script>
   <script type="text/javascript" language="javascript">
	jQuery(function($){ 
	  setInterval(function(){ 
		$.get( 'new3.php', function(newRowCount){ 
		  $('#rowcounter').html(newRowCount); 
		  alert("Times up!");
		}); 
	  },1000); // 5000ms == 5 seconds 
	}); 

   </script>
</head>
<body>
   <div id="stage" style="background-color:blue;">
          STAGE
   </div>
   <p>There are <span id='rowcounter'>xx</span> rows in the DB.</p> 
</body>
</html>
