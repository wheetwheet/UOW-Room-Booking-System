<?php

require 'readDB.php';
require 'session.php';

$sBlk = $_GET['blk'];
$sFloor = $_GET['floor'];
$id = $_GET['room'];
$d = $_GET["dating"];
$t = strval($_GET["timing"]);
$dateAcq = explode('-', $t);

// Insert new booking into database
$updateBook = "INSERT INTO booking 
(`username`, `blk`, `floor`, `room_num`, `book_start_date`, `book_end_date`, `book_start_time`, `book_end_time`) 
VALUES ('{$_SESSION['log_id']}', '$sBlk', '$sFloor', '$id', '$d', '$d', '{$dateAcq['0']}', '{$dateAcq['1']}');";

// Check for successful new booking creation
if (mysqli_query($connection, $updateBook)) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $updateBook . "<br>" . mysqli_error($connection);
}

// Get all the details for the selected room from  database
$dQuery = "SELECT * FROM `room` 
            WHERE `blk` = '$sBlk' 
            AND `floor` = '$sFloor' 
            AND `room_num` = '$id';";

$resultCheck = mysqli_query($connection, $dQuery);

$status;

// Get status from $resultCheck
if ($resultCheck) {
    // Get num of results from $resultCheck
    $rowsCount = mysqli_num_rows($resultCheck);

    // Check whether $rowsCount == 1
    if ($rowsCount == 1) {

        $status = $resultCheck;
    } else {
        $status = !($resultCheck);
    }
}

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
    <a href="index_student.php"><img src="logo.jpg" style=width:200px;height:150px; alt="Home"></a>
    <hr>
    <fieldset>
    <div class ="myheader">
        <h1>Your booking has been confirmed!</h1>
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
    <div class="theirDiv">
    <fieldset>
    <table>
        <?php
        if ($status) 
        {
            $found = mysqli_fetch_array($resultCheck);
            ?>
                <tr>
                    <h1>Room Number :
                        <?php echo $found['blk'].".".$found['floor'].".".$found['room_num']; ?></h1>
                </tr>
          
                <tr>
                    <td>
                        <label>Selected Date  </label>
                    </td>
              
                    <td>
                    <?php
                    $dateSel = date_create($d);
                    echo ":".date_format($dateSel, "d-m-Y"); ?>
                    </td>
                </tr>   
                <tr>
                    <td>
                        <label>Selected Timing  </label>
                    </td>
                    <td>
                        <?php echo ":".$t; ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price  </label>
                    </td>
                    <td>
                        <?php echo ':$'.$found['price']; ?>
                    </td>
                </tr>
                <tr>
                <?php 
                    {
                        if ($_GET['promo'] == $found['promo_code']) 
                        {
                            $disCost = number_format(($found['price'] * 0.2), 2);
                            echo "<tr><td>
                                    <b>Discount 20%  </b>
                                    </td>
                                    <td>"
                                    .":$".$disCost."
                                    </td</tr>";
							$finalcost = number_format(($found['price'] * 0.8), 2);
							echo "<tr><td>
									<b>Total </b>
									</td>
									<td>"
									.":$<b>".$finalcost.
									"</td></tr>";
                        }
                        else 
                        {
                            echo "<tr><td><b>Invalid promo code</b></td></tr>";
							
							$finalcost = number_format(($found['price']), 2);
							echo "<tr><td>
                                <b>Total </b>
                                </td>
                                <td>"
                                .":$<b>".$finalcost.
                                "</td></tr>";
                        }
                    }
                    ?>
                </tr>

                </td>
            </tr>
            <tr>
                <td>
                <button onclick="location.href='index_student.php'" type="button">Go Back</button>    
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
    </fieldset>
    </div>
    <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toDateString();
    </script>
</body>

</html>
<?php $connection -> close() ?>