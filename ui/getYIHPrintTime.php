<?php
require_once "main.php";

	$noOfPrinters = 4;
	$paidPage = (int)Printer::rowCount("SELECT SUM(page) FROM YIH_CBLC_A4 WHERE status = 'printing' OR status = 'ready'");
	if ($paidPage != null)
	{
		$expiredTime = (int)Printer::rowCount("SELECT SUM(TIMESTAMPDIFF(SECOND, time, CURRENT_TIMESTAMP())) FROM YIH_CBLC_A4 WHERE status = 'printing'");
		if($expiredTime == null)
			$expiredTime = 0;
		$estimatedTimeLeft = (int)(($paidPage*3 - $expiredTime)/$noOfPrinters);
		if($estimatedTimeLeft < 0)
			$estimatedTimeLeft = 0;
		echo $estimatedTimeLeft;
	}
	else
		echo 0;


	/*
	$printingTime = Printer::sqlQuery("SELECT time FROM YIH_CBLC_A4 WHERE status='printing'");
	$printingPage = Printer::sqlQuery("SELECT page FROM YIH_CBLC_A4 where (status='printing') or (status='ready') ");
	$totalPages = 0;
	foreach ($printingPage as $pages)
		$totalPages += $pages->page;
	if($printingTime)
	{
		$timeNow = time();
		$timeDiff = $timeNow - $printingTime[0]->time;
		//echo $totalPages*3 - (long)$timeDiff;
	}
	//else
	//	echo 0;	
	echo $totalPages*3;
	*/
?>