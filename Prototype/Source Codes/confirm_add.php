<?php
require 'readDB.php';
require 'session.php';

// Data retrieved from web form
$blk = $_POST['blk'];
$floor = $_POST['floor'];
$room_num = $_POST['room_num'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$promo_code = $_POST['promo_code'];
$capacity = $_POST['capacity'];
$price = $_POST['price'];
$creation_status = $_POST['creation_status'];
$launch_status = $_POST['launch_status'];
$availability = $_POST['availability'];
$filename = $_FILES["my_upload"]["name"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tempname = $_FILES["my_upload"]["tmp_name"];
    $folder = "uploads";
    $target_file = $folder . '/' . basename($_FILES["my_upload"]["name"]);

    // Check if file name sent is empty
    if (!empty($_FILES['my_upload']['name'])) {
        // Check length of file name
        if (strlen($filename) > 100) {
            //echo " too long file name ";
            exit;
        }

        // Set a limit to file upload size
        if ($_FILES['my_upload']['size'] > 1000000) {
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

// SQL statement to insert data into database
$sql = "INSERT INTO `room` ( `blk` , `floor` , `room_num` , `start_date` , `end_date` , `start_time` , `end_time` , `promo_code` , `capacity` ,
 `price` , `creation_status` , `launch_status` , `availability`,`image`)
VALUES (
'$blk', '$floor', '$room_num', NULL , NULL , '$start_time' , '$end_time', '$promo_code', '$capacity', '$price', '$creation_status', '$launch_status', '$availability', '$filename');";

// Check if insert is successful
if (!mysqli_query($connection, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

$connection -> close();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>

#h1{
text-align:center;
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
    <a href="index_staff.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
    <hr>
    <div class ="theirDiv">
    <fieldset>

        <h1>Your room has been added</h1>
        <table>
        <tr>
            <td>
                Room Number
                
            </td>
            <td>
            <?php echo " : ".$blk.".".$room_num.".".$floor; ?></h1>

            </td>
        </tr>
        <tr>
            <td>
            Start Time
            </td>
            <td>
            <?php echo " : ".$start_time; ?>
            </td>
        </tr>
        <tr>
            <td>
                End Time
            </td>
            <td>
                <?php echo " : ".$end_time; ?>
            </td>
        </tr>
        <tr>
            <td>
                Promo Code
            </td>
            <td>
                <?php echo " : ".$promo_code; ?>
            </td>
        </tr>
        <tr>
            <td>
                Capacity
            </td>
            <td>
                <?php echo " : ".$capacity; ?>
            </td>
        </tr>
        <tr>
            <td>
                Price
            </td>
            <td>
                <?php echo " : $".$price; ?>
            </td>
        </tr>
        <tr>
            <td>
                Creation Status
            </td>
            <td>
            <?php if ($creation_status == 'Y') {
                                echo " : Yes";
                            } else {
                                echo " : No";
                            } ?>
            </td>
        </tr>
        <tr>
            <td>
                Launch Status
            </td>
            <td>
                <?php if ($launch_status == 'Y') {
                            echo ": Yes";
                        } else {
                            echo ": No";
                        } ?>
            </td>
        </tr>
        <tr>
            <td>
                Availability
            </td>
            <td>
             <?php if ($availability == 'Y') {
                            echo " : Yes";
                        } else {
                            echo " : No";
                        } ?>
            </td>
        </tr>
        <tr>
        <td>
        <button onclick="window.location.href = 'index_staff.php';">Return Home</button>
</td>   
        </tr>
        </table>
    </fieldset>
    
    </div>
</body>

</html>