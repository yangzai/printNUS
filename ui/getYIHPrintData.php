<?php
require_once "main.php";

	if( $_REQUEST["numOfRows"] )
	{
		$printerRow = $_REQUEST['numOfRows'];
	}
	else
	{
		$printerRow = (int)Printer::rowCount("SELECT COUNT(*) FROM YIH_CBLC_A4");
	}

	$printerResults = Printer::sqlQuery("SELECT * FROM YIH_CBLC_A4");
	
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