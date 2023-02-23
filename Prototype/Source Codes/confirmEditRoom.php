<?php
include_once('readDB.php');
require 'session.php';

$filename = $_FILES["image"]["name"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads";
    $target_file = $folder . '/' . basename($_FILES["image"]["name"]);

    // Check if file name sent is empty
    if (!empty($_FILES['image']['name'])) {
        // Check length of file name
        if (strlen($filename) > 100) {
            //echo " too long file name ";
            exit;
        }

        // Set a limit to file upload size
        if ($_FILES['image']['size'] > 1000000) {
            //echo " too big file ";
            exit;
        }

        // Directory variable
        $dirOk = false;

        // Check whether directory is available
        if (!is_dir($folder)) {
            //echo ("$folder is not a directory");
            $dirOk = false;

            // Create directory if not available
            if (mkdir($folder)) {
                //echo ("$folder directory has been created successfully");
                $dirOk = true;
            } else {
                $dirOk = false;
            }
        } else {
            // Set $dirOk if available
            //echo ("$folder is a directory\n");
            $dirOk = true;
        } // End of directory check

        // Same file exists variable
        $exists = false;

        // Check if file already exists
        if (file_exists($target_file)) {
            // Set $exists to true
            $exists = true;
            //echo "Sorry, file already exists.";
        }

        // Target destination of file
        $target = "$folder/" . $filename;

        // Complete upload of file
        if ($dirOk and !$exists) {
            // Move file to target destination
            if (move_uploaded_file($tempname, $target)) {
                //echo "\nsuccess";
            } else {
                //echo "\nfailed";
            }
        }
    } else {
        // Set $filename to NULL if empty
        $filename = 'NULL';
        //echo "filename is empty";
    } // End of check file name is empty
}

$id = $_POST['room_num'];

if(empty($_POST['promo_code']))
{
	$_POST['promo_code'] = 'NULL';
}

$updateQuery = "UPDATE `room` ";
$updateQuery .= "SET `start_time` = '{$_POST['start_time']}', `end_time` = '{$_POST['end_time']}', `promo_code` = '{$_POST['promo_code']}', `capacity` = '{$_POST['capacity']}', 
`price` = '{$_POST['price']}', `creation_status` = '{$_POST['creation_status']}', `launch_status` = '{$_POST['launch_status']}', `availability` = '{$_POST['availability']}', 
`image` =  '$filename' ";
$updateQuery .= "WHERE `blk` = '{$_POST['blk']}' and `floor` = '{$_POST['floor']}' and `room_num` = '{$_POST['room_num']}';";

if(!(mysqli_query($connection, $updateQuery)))
{
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
  text-align: left;
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
    text=align:center;
    font-size:40px;
    float:center;
}
.thierDiv label{
    font-weight:bold;
}

</style>

</head>
    <a href="index_staff.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
<fieldset>
        <div class ="myheader">
        <h1>Your Update has been confirmed</h1>
        </div>
    <div class ="myDiv">
    <table>
        <tr>
            <td>
                <label>Updated Time : </label>
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
                    <?php echo $_POST['blk'].".".$_POST['floor'].".".$_POST['room_num']; ?></h1>
        <table>
            <tr>
                <td>
                    Start Time
                </td>
                <td>
                <?php echo " : ".$_POST['start_time']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    End Time
                </td>
                <td>
                <?php echo " : ".$_POST['end_time']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Promo Code
				</td>
                <td>
                  <?php echo " : ".$_POST['promo_code']; ?>
				</td>
            </tr>
            <tr>
                <td>
                    Capacity
				</td>
                <td>
                  <?php echo " : ".$_POST['capacity']; ?>
				</td>
            </tr>
            <tr>
                <td>
                    Price
                </td>
                <td>
                    <?php echo " : $".$_POST['price']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Creation Status
                </td>
                <td>
                <?php if ($_POST['creation_status'] == 'Y') {
                            echo " : Yes";
                        } else {
                            echo " : No";
                        } ?>                </td>
            </tr>
            <tr>
                <td>
                    Launch Status
                </td>
                <td>
                <?php if ($_POST['launch_status'] == 'Y') {
                            echo " : Yes";
                        } else {
                            echo " : No";
                        } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Availability
                </td>
                <td>
                    <?php if ($_POST['availability'] == 'Y') {
                            echo " : Yes";
                        } else {
                            echo " : No";
                        } ?>

                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                <?php if (strtolower($_POST['image']) == "null" || strtolower($_POST['image']) == "") {
                            echo " : No Image Found";
                        } else {
                            echo " : ".$_POST['image'];
                        } ?>                
                </td>
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

