<?php require('session.php');?>
<?php require('functions.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
div.logout
{
    position: fixed;
    width: 50%;
    bottom: 10px;
} 
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index Staff</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
  //login confirmation
  confirm_logged_in();

?>
<body>
<a href="index_staff.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
    <div class="logout" style="text-align:right"><a href="logout.php">Log Out</a></div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<hr>
    <div id="wrapper">

            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

            <!-- /.navbar-top-links -->

            
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align:center"><b>UOW Booking System - Staff</b></h1>
                </div>
              <h2 style="text-align:center">Welcome to UOW Booking System</h2><br>

    <div id ="list" style="text-align:center">
        <div id ='book'>
        <a href="addRoom.php"><i class="glyphicon glyphicon-plus" style="font-size:50px;"></i>Add a Room</a> |
        <!--Viewing of Room List and Booking of Rooms linked here-->
        <a href="edit_room.php"><i class="glyphicon glyphicon-pencil" style="font-size:50px;"></i>Edit A Room</a> |
                <!--Modifying or Cancellation of existing booking-->
        <a href="delete_room.php"><i class="glyphicon glyphicon-trash" style="font-size:50px;"></i>Delete A Room</a> | 
		<!--viewing of existing booking-->
		<a href="viewBooking.php"><i class="glyphicon glyphicon-bookmark" style="font-size:50px;"></i>View Existing Bookings</a>
    </div>


                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
