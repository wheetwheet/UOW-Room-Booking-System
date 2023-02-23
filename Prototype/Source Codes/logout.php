<?php
require 'readDB.php';
// Create session
session_start();

// Get current date and time
date_default_timezone_set("Asia/Singapore");
$d = strtotime("now");
$dt = date("Y-m-d H:i:s", $d);

// Update login time if login credentials match
$updateLogout = "UPDATE `user`";
$updateLogout .= "SET `logout_datetime` = '$dt'";
$updateLogout .= "WHERE `username` = '{$_SESSION['log_id']}';";

// Check if update login_datetime is successful
if (!mysqli_query($connection, $updateLogout)) 
{
    echo "Error: " . $updateLogout . "<br>" . mysqli_error($connection);
}

// Unset all the session variables
unset($_SESSION['log_id']);
unset($_SESSION['f_name']);
unset($_SESSION['l_name']);
unset($_SESSION['role']);

echo("Sucessfully logout! \n");
header('location: home.php');

?>
