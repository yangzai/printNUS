<?php
require_once "main.php";

$printerResults = Printer::find(CL_CBLC_PrinterH0_A4);

if (empty($printerResults)){  
	echo "Cannot find printer table!<br>";  
}  
else
{
	echo "Table found!<br>";
	echo "First entry jobID is ".$printerResults[0]->jobID;
	
}
?>