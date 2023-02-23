<?php
require ('readDB.php');
require 'session.php';

// Get username from url
$use = $_POST['username'];

// SQL Statement for getting user info
$info = "SELECT * FROM `user` ";
$info .= "WHERE `username` = '$use';";

// Perform query
$infoR = mysqli_query($connection, $info);

// variable for storing
$arr = array();

// Check if query is successful
if($infoR)
{
    // Get number of results from $infoR
    $infoRC = mysqli_num_rows($infoR);

    if($infoRC > 0)
    {
        // Fetch all
        $arr = mysqli_fetch_all($infoR, MYSQLI_ASSOC);

        $store = json_encode($arr);
        echo $store;
    }
    else
	{
		$store = json_encode($arr);
		echo $store;
	}
}
$connection -> close();
?>