<?php
require_once "main.php";
//date_default_timezone_set(new DateTimeZone("America/Los_Angeles"));
	if( $_REQUEST["numOfRows"] )
	{
		$printerRow = $_REQUEST['numOfRows'];
	}
	else
	{
		$printerRow = (int)Printer::rowCount("SELECT COUNT(*) FROM CL_CBLC_A4");
	}

	$printerResults = Printer::sqlQuery("SELECT * FROM CL_CBLC_A4");
	
	for ($i = 0; $i < $printerRow; $i++)
	{
		//$printerResults[$i]->time = new DateTime($printerResults[$i]->time);
		//$printerResults[$i]->time->setTimeZone(new DateTimeZone("Asia/Singapore"));
		echo "Queue #".($i+1)."<br />";
		echo "Job ID: ".$printerResults[$i]->jobID."<br />";
		echo "User ID: ".$printerResults[$i]->userID."<br />";
		echo "Filename: ".$printerResults[$i]->filename."<br />";
		echo "Page(s): ".$printerResults[$i]->page."<br />";
		echo "Time: ".$printerResults[$i]->time."<br />";
		echo "<br/>";
	}	
	
?>