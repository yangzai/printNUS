<?php
require_once "main.php";

	if( $_REQUEST["numOfRows"] )
	{
		$printerRow = $_REQUEST['numOfRows'];
	}
	else
	{
		$printerRow = (int)Printer::rowCount("SELECT COUNT(*) FROM CL_CBLC_A4 where status='printing' or status='ready'");
	}

	$printerResults = Printer::sqlQuery("SELECT * FROM CL_CBLC_A4 where (status='printing') or (status='ready') ");
	
	for ($i = 0; $i < $printerRow; $i++)
	{
		echo "Queue #".($i+1)."<br />";
		echo "Job ID: ".$printerResults[$i]->jobID."<br />";
		echo "User ID: ".$printerResults[$i]->userID."<br />";
		echo "Filename: ".$printerResults[$i]->filename."<br />";
		echo "Page(s): ".$printerResults[$i]->page."<br />";
		echo "Time: ".$printerResults[$i]->time."<br />";
		echo "<br/>";
	}	
	
?>