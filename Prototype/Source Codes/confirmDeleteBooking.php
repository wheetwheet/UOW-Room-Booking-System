<?php
include_once('readDB.php');
require 'session.php';

// Delete booking

$deleteQuery = "DELETE FROM `booking` WHERE `booking_id` = '{$_GET['bookingid']}';";
// Perform deletion from database
if(!(mysqli_query($connection, $deleteQuery)))
{
	echo "failure";
	echo "Error: " . $deleteQuery . "<br>" . mysqli_error($connection);
}
$connection -> close();

?>

<!DOCTYPE html>
<html>
    <head>
    <style>

.myheader{
text-align:center
}

.myDiv {
  border: 5px;
  text-align: right;
  float:right;
  font-size:20px;

  
}
.myDiv label{
    font-weight:bold;
    text-align:right;
    
}

.theirDiv h1{
    border: 5px;
    text-align:center;
    float:center;
}

.theirDiv table{
    border: 5px;
    align:center;
    font-size:40px;
    float:center;
}
.thierDiv label{
    font-weight:bold;
}

</style>

</head>
<body>
    <a href="index_student.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
    <hr>
    <fieldset>
    <div class ="myheader">
        <h1>Your booking has been DELETED!</h1>
    </div>
    <div class ="myDiv">
    <table>
        <tr>
            <td>
                <label>Booking Time : </label>
            </td>
            <td>
                <b id="demo"></b>
            </td>
        </tr>
        <tr>
            <td>
                <label>Name : </label>
            </td>
            <td>
            <?php echo $_SESSION['l_name'] . ' ' . $_SESSION['f_name']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>UOW ID : </label>
            </td>
            <td>
            <?php echo $_SESSION['log_id']; ?>
            </td>
        </tr>   
    </div>
    </table>
    </fieldset>
    <hr>
    <fieldset>

    <div class="theirDiv">
    <h1>Booking ID : 
                    <?php echo $_GET['bookingid'] ?></h1>
    <table>
    <tr>
    <td>
        <label>Room Number</label>
    </td>
    <td>
        <?php echo " : ".$_GET['blk'].".".$_GET['floor'].".".$_GET['id']; ?></h1>
    </td>
    </tr>
    <tr>
        <td>
            <label>Username </label>
        </td>
        <td>
        <?php echo" : ".$_SESSION['log_id']; ?>

        </td>

    </tr>
    
        <tr>
            <td>
            <label>Booking Date</label>
            </td>
            <td>
			<?php
				$dateSel = date_create($_GET['date']);
				echo ":".date_format($dateSel, "d-m-Y"); ?>
            </td>
        </tr>
        <tr>
            <td>
            <label>Booking Time</label>
            </td>
            <td>
                <?php echo " : ".$_GET['startTime']. ' - '. $_GET['endTime']; ?>
            </td>
        </tr>

        <tr>
            <td>
			</td>
        </tr>
        <tr>
                <td>
                <button onclick="location.href='index_student.php'" type="button">Go Back</button>    
                </td>
            </tr>

        </table>
    </div>
    </fieldset>
                    
    <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toDateString();
    </script>
</body>
</html>

