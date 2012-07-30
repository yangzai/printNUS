<?php
require_once "main.php";

//$printerResults = Printer::find(CL_CBLC_PrinterH0_A4);
//$printerResults = Printer::sqlQuery("SELECT COUNT(*) FROM CL_CBLC_PrinterH0_A4");
//$printerRow = (int)Printer::rowCount("SELECT COUNT(*) FROM CL_CBLC_PrinterH0_A4");
//$printerResults = Printer::sqlQuery("SELECT * FROM CL_CBLC_PrinterH0_A4");
//$printerStatus = Printer::sqlQuery("SELECT status FROM CL_CBLC_PrinterH0_A4");
//echo "Number of printerRow is $printerRow";
echo "Welcome to NUS Print Queue Viewer"; 
//if (empty($printerResults)){
//	;
	//echo "Cannot find printer table!<br>";  
//}  
//else
//{
//	;
	//echo "Table found!<br>";
	//echo "First entry jobID is ".$printerResults[0]->jobID;
	
//}
?>

<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>NUS Print Queue Viewer</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<link rel="stylesheet" href="justin.css" type = text/css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>
<script src="./ui/min/jquery.ui.map.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(function() {
                // Also works with: var yourStartLatLng = '59.3426606750, 18.0736160278';
                var yourStartLatLng = new google.maps.LatLng(59.3426606750, 18.0736160278);
                $('#map_canvas').gmap({'center': yourStartLatLng});
				$('#map_canvas').gmap('addMarker', { 'position': '59.3426606750, 18.0736160278', 'title':"test" }, function() {});

        });
		
		var globalCBLCPrintQV;
		
		jQuery(function($){ 			
			$.get( 'getCBLCPrintQ.php', function(CBLCPrintQV){ 
				$('#CBLCPrintQTag').html(CBLCPrintQV); 
				globalCBLCPrintQV = CBLCPrintQV;
			});
			
			$.get( 'getCBLCPrintData.php', function(CBLCPrintDataV){ 
				$('#CBLCPrintDataTag').html(CBLCPrintDataV); 
			}); 

			setInterval(function(){ 
				$.get( 'getCBLCPrintQ.php', function(CBLCPrintQV){ 
					$('#CBLCPrintQTag').html(CBLCPrintQV); 
					globalCBLCPrintQV = CBLCPrintQV;
				}); 
				$.get( 'getCBLCPrintData.php', {numOfRows: globalCBLCPrintQV}, function(CBLCPrintDataV){ 
					$('#CBLCPrintDataTag').html(CBLCPrintDataV); 
				}); 
			},10000); // 10000ms == 10 seconds 
		}); 

		var count = 10;
		var counter=setInterval("timer()", 1000);
		function timer()
		{
			count=count-1;
			if(count < 0)
				count = 10;
				
			document.getElementById("timer").innerHTML=count + " secs";
		}
		
		
</script>

</head> 

<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="one">

	<div data-role="header" data-theme="c">
		<h1>Print Queue</h1>
	</div><!-- /header -->

	<div data-role="content" >
		<!--<ul data-role="listview" data-filter="true">-->
		<div data-role="collapsible-set">
			<!--<li data-role="list-divider">A</li>-->
			<!--<li><a href="#two" data-transition="slide">Test</a></li>-->
			<!--<li data-role="list-divider">B</li>-->
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>Business Library (2 printers)</h3>
				<div data-role="collapsible" data-iconpos="right" data-mini=true data-theme="e" data-content-theme="e">
					<h4>
					<span id='CBLCPrintQTag'>Retrieving...</span>&nbspjob(s) printing now<br />
					</h4>
					<span id='CBLCPrintDataTag'>Retrieving...</span>
					<br />
				</div>
				<h5>Est. printing time: <span id="timer"></span> </h5> </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>CBLC@YIH (4 printers)</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>Central Library (4 printers)</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>Science Library (4 printers)</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>School of Computing (5 printers)</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b" data-content-theme="b">
				<h3>University Town</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
		</div>
	</div>

	<div data-role="footer" data-theme="d" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#one" data-icon="home">Print Queue</a></li>
				<li><a href="#basic_map" data-icon="grid">Nearest Printer</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
</div><!-- /page one -->

<!-- Start of second page: #two -->

<div data-role="page" class="page-map" id="basic_map">

    <div data-role="content"> 
        <div id="map_canvas"></div>
    </div>

	<div data-role="footer" data-theme="d" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar">
			<ul>
				<li><a href="#one" data-icon="home">Print Queue</a></li>
				<li><a href="#basic_map" data-icon="grid">Nearest Printer</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
</div>

<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Dialog</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Popup</h2>
		<p>I have an id of "popup" on my page container and only look like a dialog because the link to me had a <code>data-rel="dialog"</code> attribute which gives me this inset look and a <code>data-transition="pop"</code> attribute to change the transition to pop. Without this, I'd be styled as a normal page.</p>		
		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Back to page "one"</a></p>	
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page popup -->

</body>
</html>
