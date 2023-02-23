<?php

require ('readDB.php');
require 'session.php';

$username = $_POST['username'];

$info = "SELECT * FROM `user` WHERE `username` = '$username';";

// Check for successful query
if (!(mysqli_query($connection, $info))) {
    echo "failure";
    echo "Error: " . $info . "<br>" . mysqli_error($connection);
}

$result = mysqli_query($connection, $info);
$resultCheck = mysqli_num_rows($result);

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
        <h1>User has been deleted</h1>
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
	<?php
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td>
                <label>Username</label>
            </td>
            <td>
                <?php echo " : ".$row['username']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Full Name</label>
            </td>
            <td>
                <?php echo " : ".$row['first_name']." ".$row['last_name']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Date of Birth</label>
            </td>
            <td>
                <?php 
				$date = date_create($row['dob']);
				echo " : ".date_format($date, "d-m-Y"); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
            <?php echo " : ".$row['email']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Role</label>
            </td>
            <td>
                <?php if ($row['role_id'] == 0)
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
                <?php echo " : ".$row['status']; ?>
            </td>
        </tr>
                <tr>
                <td>
                <button onclick="location.href='index_useradmin.php'" type="button">Go Back</button>    
                </td>
            </tr>
		<?php }
        } ?>
      </table>

        </fieldset>
</div>  

        <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toDateString();
    </script>
    </body>
</html>
<?php
// Delete user record
$deleteQuery = "DELETE FROM `user` WHERE `username` = '$username';";


// Check for successful delete
if (!(mysqli_query($connection, $deleteQuery))) {
    echo "failure";
    echo "Error: " . $deleteQuery . "<br>" . mysqli_error($connection);
}
$connection -> close();

?>