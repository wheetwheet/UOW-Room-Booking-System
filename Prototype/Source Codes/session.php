<?php

// Create session
session_start();

// Check session variable role is on set
function logged_in()
{
  return isset($_SESSION['role']);
}

// redirect to login page if session variable log_id is not set

function confirm_logged_in()
{
  if (!logged_in())
  {
    header('location: home.php');
	exit();
  }
}

?>
