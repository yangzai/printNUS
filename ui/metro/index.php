<?php
require_once "main.php";

//$printerResults = Printer::find(CL_CBLC_PrinterH0_A4);
$printerResults = Printer::sqlQuery("SELECT COUNT(*) FROM CL_CBLC_PrinterH0_A4");

if (empty($printerResults)){
	;
	//echo "Cannot find printer table!<br>";  
}  
else
{
	;
	//echo "Table found!<br>";
	//echo "First entry jobID is ".$printerResults[0]->jobID;
	
}
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
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
				<h3>Business Library</h3>
				<p>Utilization: 50% <br />
				Total no. of printers: 2.<br />
				<?php echo $printerResults[0]->COUNT?> jobs in queue now.<br />
				Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
				<h3>CBLC@YIH</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
				<h3>Central Library</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
				<h3>Science Library</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
				<h3>School of Computing</h3>
				<p>4 jobs in queue now.</p>
				<p>Est. time: 5min 36s. </p>
			</div>
			<div data-role="collapsible" data-iconpos="right" data-theme="b">
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
