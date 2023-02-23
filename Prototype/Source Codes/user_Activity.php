<?php
require ('readDB.php');
require 'session.php';

$actQuery = "SELECT * FROM `user`;";


$result = mysqli_query($connection, $actQuery);
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

        .submitLink {
            background-color: transparent;
            text-decoration: underline;
            border: none;
            color: blue;
            cursor: pointer;
        }

        submitLink:focus {
            outline: none;
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
    <a href="index_useradmin.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
    <hr>
    <hr>
    <input type="text" id="myInput" onkeyup="myFunction0()" placeholder="Search for users by username..">
    <table id="myTable0" style="width:100%;">
        <tr>
            <th width=30%>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role </th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Last Logout</th>
        </tr>

        <?php
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td>
                        <?php echo $row['username']; ?>
                    </td>
                    <td width="25%">
                        <?php echo $row['first_name'] . " " . $row['last_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php if ($row['role_id'] == 1) { ?>
                            Admin
                        <?php } else if ($row['role_id'] == 2) { ?>
                            User Admin
                        <?php } else if ($row['role_id'] == 0) { ?>
                            Student
                        <?php
                        } ?>
                    </td>
                    <td>
                        <?php echo $row['status']; ?>
                    </td>
                    <td>
                        <?php
                        $datetime = date_create($row['login_datetime']);
                        echo date_format($datetime, "d/m/Y H:i:s");
                        ?>
                    </td>
                    <td>
                        <?php
                        $datetime = date_create($row['logout_datetime']);
                        echo date_format($datetime, "d/m/Y H:i:s");
                        ?>
                    </td>
                </tr>

        <?php }
        } ?>


    </table>
    <script src="non_Jquery.js"></script>
</body>

</html>
<?php $connection->close(); ?>