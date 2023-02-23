<?php
include_once('readDB.php');
require 'session.php';
require 'functions.php';

$id = $_GET['id'];
$query = "SELECT *
FROM `booking`
WHERE `booking_id` =$id;";
$result = mysqli_query($connection, $query);
$resultCheck = mysqli_query($connection, $query);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Booking Form Page</title>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        .formLayout {
            background-color: #f3f3f3;
            border: solid 1px #a1a1a1;
            padding: 10px;
            width: 480px;
        }

        .formLayout label,
        .formLayout input,
        .formLayout select {
            display: block;
            width: 230px;
            float: left;

            text-align: left;
            padding-right: 20px;
            font-weight: bold;
        }

        br {
            clear: left;
        }
    </style>
</head>

<body>
    <a href="index_student.php"><img src="logo.jpg" style=width:200px;height:150px; alt="Home"></a>
    <hr>
    <hr>
        <form id="form-submit" action="confirmEdit.php" method="get" class="formLayout" ?>
            <div class="col-md-6">
                <fieldset>
                    <td>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <label for="bookingId">Your Booking ID is : <label>
                                    <span name="book_id" value="<?php echo $row['booking_id']; ?>">
                                        <b> <?php echo $row['booking_id']; ?> </b>
                                    </span>
                                    <input type="hidden" name="bookingId" id="bookingId" value=<?php echo $row['booking_id']; ?>>
                                    <br><br>

                                    <label for="room">You have booked room : </label>
                                    <span name="room_no" value="<?php echo $row['room_num']; ?>">
                                        <b> <?php echo $row['room_num']; ?> </b>
                                    </span>

                                    <input type="hidden" name="blk" id="blkk" value="<?php echo $row['blk']; ?>">
                                    <input type="hidden" name="floor" id="fl" value="<?php echo $row['floor']; ?>">
                                    <input type="hidden" name="room" id="rm" value="<?php echo $row['room_num']; ?>">
                                    <input type="hidden" name="datee" id="datee" value="<?php echo $row['book_start_date']; ?>">
                    </td>
                    <br><br>
                    <label for="dating">Date : </label>
                    <input type="date" id="datepicker" name="dating" value="<?php echo $row['book_start_date']; ?>"><br /><br>
                    <label for="timing">Timing :</label>
                    <select name="timing" id="timing" value="<?php echo $row['book_start_time'] . " - " . $row['book_end_time']; ?>">
                        <option> - </option>
                    </select>
                    </br></br>
                    <?php } ?>
                    
                    <button type="submit" id='submit' class="btn" name="submit">Submit</button>
                    <button type="reset" value="Reset">Reset</button>
                </fieldset>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="customjs.js"></script>
        <!-- <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
         $(function() {
            $( "#datepicker" ).datepicker();
         });
      </script>
      -->
</body>

</html>
<?php $connection -> close() ?>