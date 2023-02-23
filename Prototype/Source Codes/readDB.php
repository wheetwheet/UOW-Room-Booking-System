<?php

$server = "localhost";
$usern = "admin";
$passw = "admin";
//$password = md5("admin");
$database = "test";

// Create connection
//$connection = mysqli_connect($server, $usern, $passw);
$connection = new mysqli($server, $usern, $passw);

// Check connection
if ($connection -> connect_error)
{
    die("Connection failed: " . $connection -> connect_error);
    echo("\n");
}
else
{
    //echo("Connection established. \n");
}

// Select database
$checkDatabase = $connection -> select_db($database);

// Check database
if (!$checkDatabase)
{
    die("Unable to select database. \n");
}
else
{
    //echo("$database is selected successfully. \n");
}



//$connection -> close();
?>
