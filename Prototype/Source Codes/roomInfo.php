<?php

// Include connection to database and session file
require 'readDB.php';
require 'session.php';

// query statement to get all available rooms
$availQuery = "SELECT * FROM room 
                WHERE `availability` = 'Y' 
                ORDER BY 1, 2, 3 ASC;";

// Make a query to database
$availResult = mysqli_query($connection, $availQuery);

?>

<!DOCTYPE html>
<html lang="en">
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Welcome to UOW Booking Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        td {
            height: 100px;
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
    <a href="index_student.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
    <hr>
    <hr>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for room..">
    <table id="myTable" style="width:100%;">
        <tr>
            <th>Photo</th>
            <th width="20%">Room Number</th>
            <th>Capacity</th>
            <th>Price</th>
            <th width="10%">availablity</th>
        </tr>
        <?php
        if ($availResult) {
            // Get num of results
            $resultCheck = mysqli_num_rows($availResult);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($availResult)) {
        ?>
                    <tr>
                        <td>
                            <?php
                            $a = array($row['blk'], $row['floor'], $row['room_num']);
                            echo '<img src = "uploads/' . $row['image'] . '" alt = "' . implode(".", $a) . '" width="100px" height="100px">';
                            ?>
                        </td>
                        <td>
                            <?php
                            $a = array($row['blk'], $row['floor'], $row['room_num']);
                            echo implode(".", $a);
                            ?>
                        </td>
                        <td width="25%">
                            The total capacity for this room is :
                            <?php echo $row['capacity']; ?>
                            people
                        </td>
                        <td>
                            $<?php echo $row['price']; ?> / hour
                        </td>
                        <td>
                            <?php if ($row['availability'] == 'Y' || $row['availability'] == 'y') {
                            ?>
                                <a href='bookingForm.php?blk=<?php echo $row['blk']; ?>&floor=<?php echo $row['floor']; ?>&id=<?php echo $row['room_num']; ?>'>Book Now</a>
                            <?php
                            } else if ($row['availability'] == 'N' || $row['availability'] == 'n') {
                            ?>
                                <b style=" color:red" ;>Not available</b>
                            <?php
                            }; ?>
                        </td>
                    </tr>
        <?php }
            }
            $connection->close();
        } ?>


    </table>
    <script src="non_Jquery.js"></script>
</body>


</html>