<?php
include_once('readDB.php');
require 'session.php';

// date selected
$dSelected = $_GET['date'];

// SQL statement for get booked time
$bookedTime = "SELECT `book_start_time` ";
$bookedTime .= "FROM `booking` ";
$bookedTime .=  "WHERE `book_start_date` = '$dSelected' and `blk` = '{$_GET['blk']}' and `floor` = '{$_GET['floor']}' and `room_num` = '{$_GET['id']}' ";
$bookedTime .= "ORDER BY `book_start_date` ASC;";

// Get the booked times
$bookedR = mysqli_query($connection, $bookedTime);

// $notOk array for booked time
$notOk = array();

// Variable to hold values of $notOk later
$store;

// Check if query is successful
if($bookedR)
{
	// Get number of results from $bookedR
	$bookedRC = mysqli_num_rows($bookedR);
	
	if($bookedRC > 0)
	{
		// Fetch all
		$notOk = mysqli_fetch_all($bookedR, MYSQLI_ASSOC);

		$store = json_encode($notOk);
		echo $store;
	}
	
	else
	{
		$store = json_encode($notOk);
		echo $store;
	}
}
$connection -> close();
?>