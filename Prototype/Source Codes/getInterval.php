<?php
include_once('readDB.php');
require 'session.php';

$start = $_GET['st'];
$end = $_GET['et'];

function splitTime($StartTime, $EndTime, $Duration="60")
{
	$ReturnArray = array ();// Define output
    $StartTime    = strtotime ($StartTime); //Get Timestamp
    $EndTime      = strtotime ($EndTime); //Get Timestamp
	$timeDiff = ($EndTime - $StartTime)/60;
    $AddMins  = $Duration * 60;

	// Populate the $ReturnArray with values
    while ($StartTime <= $EndTime) //Run loop
    {
        $ReturnArray[] = date ("H:i", $StartTime);
        $StartTime += $AddMins; //Endtime check
    }
	return $ReturnArray;

}
$parz = splitTime($start, $end, 60);

$pa = json_encode($parz);
echo $pa;

?>