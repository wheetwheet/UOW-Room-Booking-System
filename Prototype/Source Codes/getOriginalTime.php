<?php
include_once('readDB.php');
require 'session.php';

$timeOri = array();

// Get start time and end time from selected room
// SQL statement for getting start and end time from selected room
$timeQ = "SELECT `start_time`, `end_time` ";
$timeQ .= "FROM `room` ";
$timeQ .= "WHERE `blk` = '{$_GET['blk']}' and `floor` = '{$_GET['floor']}' and `room_num` = '{$_GET['id']}' ;";

$timeR = mysqli_query($connection, $timeQ);
$iStart;
$iEnd;

// Check $timeR query
if($timeR)
{
	// Get number of results from $timeR
	$timeRC = mysqli_num_rows($timeR);
	
	// Check whether $timeRC == 1
	// as there should only be 1 results received
	if($timeRC == 1)
	{
		// Fetch array
		$found_result = mysqli_fetch_array($timeR);

		$timeOri[0] = $found_result['start_time'];
		$timeOri[1] = $found_result['end_time'];

		$iStart = json_encode($timeOri);
		echo $iStart;
	}
	return $timeOri;
}
$connection -> close();
?>