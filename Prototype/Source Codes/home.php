<?php require 'functions.php'; ?>
<?php require 'session.php'; ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!--/*
		<link rel="icon" type="image/png" href="favicon.png"/>
		<link rel="shortcut icon" type="image/png" href="favicon.png" />
		<link rel="shortcut icon" href="https://www.geeksforgeeks.org/favicon.ico" type="image/x-icon" />
		*/-->
    <title>Welcome to UOW Booking Page</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico" />
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
	if (logged_in())
	{
		redirect_page();
	}	
		
		
		
		
?>

    <body>
        <form class="box" action="authLogin.php" method="POST">
            <img src="white2.png" style="width: 250px; height: 200px; color: black; justify-content: center; align-items: center;">
            <h1>UOW Booking System</h1>
            <label for="kind">Login as:</label>
            <select id="kind" name="kind" class="kind kind-sm">
                <option value = "">---</option>
                <option value = "staff">Staff</option>
                <option value = "student">Student</option>
            </select>
            <input type="text" name="userid" placeholder="ID">
            <input type="password" name="password" placeholder="PASSWORD">
            <input type="submit" name="login" value="LOGIN">
        </form>
    </body>

</html>