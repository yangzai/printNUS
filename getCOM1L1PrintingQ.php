<?php
require_once "main.php";
	echo (int)Printer::rowCount("SELECT COUNT(*) FROM COM1_L1_A4 where status='printing' or status='ready'");
?>