<?php
require_once "main.php";
	echo (int)Printer::rowCount("SELECT COUNT(*) FROM CL_CBLC_A4 where status='printing' or status='ready'");
?>