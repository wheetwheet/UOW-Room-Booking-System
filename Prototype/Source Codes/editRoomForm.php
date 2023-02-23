<?php
include_once('readDB.php');
require 'session.php';
require 'functions.php';


$id = $_GET['id'];
$query = "SELECT *
FROM `room`
WHERE `blk` = '{$_GET['blk']}' and `floor` = '{$_GET['floor']}' and `room_num` = '{$_GET['id']}';";
$result = mysqli_query($connection,$query);
$resultCheck = mysqli_query($connection, $query);

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Update Room Page</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
    .formLayout
    {
        background-color: #f3f3f3;
        border: solid 1px #a1a1a1;
        padding: 10px;
        width: 480px;
    }

    .formLayout label, .formLayout input, .formLayout select
    {
        display: block;
        width: 230px;
        float: left;

        text-align: left;
        padding-right: 20px;    
        font-weight: bold;
    }

    br
    {
        clear: left;
    }


    </style>  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
</head>
<body>
    <a href="index_staff.php"><img src="logo.jpg" style= width:200px;height:150px; alt="Home"></a><hr>
    <hr>
    <form id="form-submit" action="confirmEditRoom.php" method="POST" class="formLayout" enctype="multipart/form-data">
        <div class="col-md-6">
            <fieldset>

                <td>
            <?php while ($row = mysqli_fetch_assoc($result))
            {
            ?>
                <label for='blk'>Block : </label>
				<input type = "text" name ="blk" value =<?php echo $row['blk']; ?>>

				<br><br>

                <label for='floor'>Floor : </label>
                <input type = "number" name ="floor" value =<?php echo $row['floor']; ?>><br><br>

                <label for='room_num'>Room Number : </label>
                <input type = "number" name ="room_num" value =<?php echo $row['room_num']; ?>><br><br>

                <label for="start_time">Start Time : </label>
                <input type ="time" id = "start_time" name = "start_time" value =<?php echo $row['start_time']; ?>><br/><br>

                <label for="end_time">End Time : </label>
                <input type ="time" id = "end_time" name = "end_time" value =<?php echo $row['end_time']; ?>><br/><br>

                <label for="promo_code">Promo Code: </label>
                <input type = "text" id = "promo_code" name = "promo_code" value ='<?php 
				if(strtolower($row['promo_code']) == 'null')
				{
					echo '';
				}
				else if ($row['promo_code'] == '')
				{
					echo '';
				}
				else
				{
				 echo $row['promo_code']; 
				}?>'> <br><br>

                <label for="capacity">Capacity :</label>
                <input type = "number" id = "capacity" name = "capacity" value =<?php echo $row['capacity']; ?>><br><br> 

                <label for="price">Price :</label>
                <input type = "number" id = "price" name = "price" value =<?php echo $row['price']; ?>><br><br> 
                
                <label>Creation Status : </label>
                <select name = "creation_status" id = "creation_status">
				<?php displaySelect($row['creation_status']); ?>
                </select><br><br>

                <label>Launch Status : </label>
                <select name = "launch_status" id = "launch_status">
				<?php displaySelect($row['launch_status']); ?>
                </select><br><br>


                <label>Availability : </label>
                <select name = "availability" id = "availability">
				<?php displaySelect($row['availability']); ?>
                </select><br><br>

                <input type="hidden" name="size" value="1000000">
                Image <br>
                <input type="file" name="image" id = "image">
                <br><br>
            <?php }?>
               
            <button type="submit" id= 'submit' class="btn" name = "submit">Submit</button>
            <button type="reset" value="Reset">Reset</button>            
        </fieldset>
    </div>
</form>
</body>
</html>
<?php $connection -> close(); ?>