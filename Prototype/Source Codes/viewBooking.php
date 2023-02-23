<?php
require 'readDB.php';
require 'session.php';


$query = "SELECT *
FROM `booking`;";
$result = mysqli_query($connection, $query);
$resultCheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Welcome to UOW Booking Page</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        td {
            height: 100px;
        }

        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            /* Add a search icon to input */
            background-position: 10px 12px;
            /* Position the search icon */
            background-repeat: no-repeat;
            /* Do not repeat the icon image */
            width: 50%;
            /* Full-width */
            font-size: 16px;
            /* Increase font-size */
            padding: 12px 20px 12px 40px;
            /* Add some padding */
            border: 1px solid #ddd;
            /* Add a grey border */
            margin-bottom: 12px;
            /* Add some space below the input */
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <a href="index_staff.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
    <hr>
    <hr>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for room..">
    <table id="myTable" style="width:100%;">
        <tr>
            <th>Booking ID</th>
            <th>Room Number</th>
            <th>Date</th>
            <th>Time</th>
            <th>Username</th>
        </tr>

        <?php
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td>
                    <?php echo $row['booking_id']; ?>

                </td>
                <td width="25%">

                    <?php echo $row['blk'] . "." . $row['floor'] . "." . $row['room_num']; ?>
                </td>
                <td>
                    <?php 
					$old1 = $row['book_start_date'];
					$old2 = $row['book_end_date'];
					$new1 = date("d/m/Y", strtotime($old1));
					$new2 = date("d/m/Y", strtotime($old2));
					echo $new1 . " TO " . $new2; 
                    ?>
                </td>
                <td>
                    <?php echo $row['book_start_time'] . " TO " . $row['book_end_time']; ?>
                </td>
				<td>
					<?php echo $row['username']; ?>
				</td>
        <?php }
        } ?>


    </table>
    <script src="non_Jquery.js"></script>
</body>

</html>
<?php $connection -> close(); ?>