<?php
include_once('readDB.php');
require 'session.php';

$query = "SELECT *
FROM `room`
WHERE 1
ORDER BY 13 DESC, 1 ASC, 2 ASC, 3 ASC;";
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
    <a href="index_staff.php"><img src="logo.jpg" style=width:200px;height:150px; alt="Home"></a>
    <hr>
    <hr>
    <input type="text" id="myInput" onkeyup="myFunction0()" placeholder="Search for room..">
    <table id="myTable0" style="width:100%;">
        <tr>
            <th width=30%>Room Number</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Availablity</th>
            <th>Edit</th>
        </tr>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td>
                    <input type="hidden" name="blk" value="<?php echo $row['blk']; ?>">
                    <input type="hidden" name="floor" value="<?php echo $row['floor']; ?>">
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
                    <?php
                    if ($row['availability'] == 'Y') { ?>
                        <b style=" color:green" ;><?php echo "Yes"; ?></b>
                    <?php } else { ?>
                        <b style=" color:red" ;><?php echo "No"; ?></b>
                    <?php     }
                    ?>

                </td>


                <td>
                    <a href='editRoomForm.php?blk=<?php echo $row['blk']; ?>&floor=<?php echo $row['floor']; ?>&id=<?php echo $row['room_num']; ?>'>Edit</a>
                </td>

            </tr>
        <?php }
        ?>


    </table>
    <script src="non_Jquery.js"></script>
</body>

</html>
<?php $connection->close(); ?>