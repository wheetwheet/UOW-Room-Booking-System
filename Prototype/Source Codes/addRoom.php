<?php require('session.php');?>
	
<html>
<head>
<style>
		.formLayout {
			background-color: #f3f3f3;
			border: solid 1px #a1a1a1;
			padding: 10px;
			width: 480px;
		}

		.formLayout label,
		.formLayout input,
        .formLayout button,
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
    <a href="index_staff.php"><img src="logo.jpg" style= "width:200px;height:150px;" alt="Home"></a><hr>
    <div class="logout" style="text-align:right"><a href="logout.php">Log Out</a></div>

   
    <form id="form-submit" action="confirm_add.php" class="formLayout" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <fieldset>
                <h1>Adding a Room</h1>
                <label for ="blk">Block :</label>
                <select name = "blk" id = "blk">
                
                <?php require 'readDB.php';
                $query = "SELECT * FROM `building`;";
		        $result = mysqli_query($connection,$query);
                
                while ($row = mysqli_fetch_assoc($result))
                {
                    $r = $row['blk'];
                    echo '<option value="'. $r. '">'. $r. '</option>';
                }	
		        $connection -> close();
		        ?>

                </select>
                <br><br>

                <label for ="floor">Floor : </label>
                <input type="text" id="floor" name ="floor"><br/><br>

                <label for="room_num">Enter Room Number :</label>
                <input type = "text" id = "room_num" name = "room_num"><br><br> 

                <label for="start_time">Start Time : </label>
                <input type ="time" id = "start_time" name = "start_time"><br/><br>

                <label for="end_time">End Time : </label>
                <input type ="time" id = "end_time" name = "end_time"><br/><br>

                <label for="promo_code">Promo Code: </label>
                <input type = "text" id = "promo_code" name = "promo_code"> <br><br>

                <label for="capacity">Capacity :</label>
                <input type = "number" id = "capacity" name = "capacity"><br><br> 

                <label for="price">Price :</label>
                <input type = "number" id = "price" name = "price"><br><br> 
                
                <label>Creation Status : </label>
                <select id = "creation_status" name = "creation_status">
                    <option value = "Y">Yes</option>
                    <option value = "N">No</option>
                </select><br><br>

                <label>Launch Status : </label>
                <select id = "launch_status" name = "launch_status">
                    <option value = "Y">Yes</option>
                    <option value = "N">No</option>
                </select><br><br>

                <label>Availability : </label>
                <select id = "availability" name = "availability">
                    <option value = "Y">Yes</option>
                    <option value = "N">No</option>
                </select><br><br>

                <input type="hidden" name="size" value="1000000">
                <label>Image : </label>
                <input type="file" name="my_upload" id = "image"><br><br>

                <button type="submit" id= 'submit' class="btn" name = "submit" style = "width: 70px;">Submit</button>
                <button type="reset" value="Reset" style = "width: 70px;">Reset</button>            
            </fieldset>
        </div>
    </form>
</body>
</html>