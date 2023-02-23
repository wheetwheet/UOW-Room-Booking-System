<?php
include_once('readDB.php');
require 'session.php';

$t = strval($_GET["timing"]);
$timeAcq = explode('-', $t);

// Update booking
$updateQuery = "UPDATE `booking` ";
$updateQuery .= "SET `book_start_date` = '{$_GET['datee']}', `book_end_date` = '{$_GET['datee']}', ";
$updateQuery .= "`book_start_time` = '$timeAcq[0]', `book_end_time` = '$timeAcq[1]' ";
$updateQuery .= "WHERE `booking_id` = '{$_GET['bookingId']}';";

// Check for successful editing
if (!(mysqli_query($connection, $updateQuery))) {
    echo "failure";
    echo "Error: " . $updateQuery . "<br>" . mysqli_error($connection);
}


$id = $_GET['bookingId'];
$query = "SELECT *
FROM `booking`
WHERE `booking_id` = $id;";
$result = mysqli_query($connection,$query);
$resultCheck = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
    <head>
  
</head>
    <a href="index_student.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
        <h1>Your booking has been confirmed</h1>
        Updated Time : <b id="demo"></b><br>
       
      
        <hr>  
        <table>
        <?php 
            
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
            <tr>
                    <td>
                    <h1>Booking ID : 
                        <?php echo $row['booking_id']; ?></h1>
                        <h2>Room Number : 
                        <?php echo $row['room_num']; ?></h2>
                    </td>
            </tr>
            <tr>
                    <td>
                    Block <?php echo $row['blk'].".".$row['floor'].".".$row['room_num']; ?>
                    </td>
            </tr>
            <tr>
                <td>
                    Updated Date :  <?php echo $_GET["dating"]; ?><br>
                    Updated Timing : <?php echo $_GET["timing"]; ?><br>
                </td>
            </tr>    
            <?php 
            }
        
            ?>
        </table>
                    
        <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toDateString();
        </script>
</body>
</html>
<?php $connection -> close() ?>
