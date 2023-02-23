<?php

require ('readDB.php');
require 'session.php';

$username = $_POST['username'];
$password = $_POST['pwd'];
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$role = $_POST['role'];
$stat = $_POST['status'];

if($_POST['role'] == '')
{
    $role = '0';
}

// Update user record
$updateQuery = "UPDATE `user` ";
$updateQuery .= "SET `username` = '$username', `password` = '$password', `first_name` = '$first_name', `last_name` = '$last_name', ";
$updateQuery .= "`dob` = '$dob', `email` = '$email', `role_id` = '$role', `status` = '$stat' ";
$updateQuery .= "WHERE `username` = '$username';";

// Check for successful editing
if (!(mysqli_query($connection, $updateQuery))) {
    echo "failure";
    echo "Error: " . $updateQuery . "<br>" . mysqli_error($connection);
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
        <a href="index_useradmin.php"><img src="logo.jpg" style= "width:200px;height:150px;" alt="Home"></a><hr>
        <hr>
    <fieldset>
    <div class ="myheader">
        <h1>User has been edited</h1>
    </div>
    <div class ="myDiv">
    <table>
        <tr>
            <td>
                <label>Update Time : </label>
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
        <tr>
            <td>
                <label>Username</label>
            </td>
            <td>
                <?php echo " : ".$username; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Full Name</label>
            </td>
            <td>
                <?php echo " : ".$first_name." ".$last_name; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Date of Birth</label>
            </td>
            <td>
                <?php 
				$date = date_create($dob);
				echo " : ".date_format($date, "d-m-Y"); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
            <?php echo " : ".$email; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Role</label>
            </td>
            <td>
                <?php if ($role == 0)
                        {
                            echo " : Student";
                        } 
                        else if ($role == 1)
                        {
                            echo " : Admin";
                        } 
                        else if ($role == 2)
                        {
                            echo " : User Admin";
                        }  
                    ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Status</label>
            </td>
            <td>
                <?php echo " : ".$stat ?>
            </td>
        </tr>
                <tr>
                <td>
                <button onclick="location.href='index_useradmin.php'" type="button">Go Back</button>    
                </td>
            </tr>
      </table>

        </fieldset>
</div>  

        <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toDateString();
    </script>
    </body>
</html>