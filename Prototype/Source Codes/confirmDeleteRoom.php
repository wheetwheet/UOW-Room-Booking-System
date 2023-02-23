<?php
include_once('readDB.php');
require 'session.php';

// Get price of room

$deleteQuery = "DELETE FROM `room` WHERE `blk` = '{$_GET['blk']}' and `floor` = '{$_GET['floor']}' and `room_num` = '{$_GET['id']}';";

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
    <a href="index_staff.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
        <hr>
        <fieldset>
        <div class ="myheader">

        <h1>Your selected room has been deleted</h1>
        </div>

        <div class = "myDiv">
        <div class ="myDiv">
    <table>
        <tr>
            <td>
                <label>Delete Date : </label>
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
                    <h1>Room Number : 
                    <?php echo $_GET['blk'].".".$_GET['floor'].".".$_GET['id']; ?></h1>
        <table>
            <tr>

            </tr>
            <tr>
                <td>
                <button onclick="location.href='index_staff.php'" type="button">Go Back</button>    
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

