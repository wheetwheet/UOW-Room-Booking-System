<?php

require('readDB.php');
require 'session.php';

// Get value from username from post method
$usern = $_POST['username'];

// SQL Statement for getting user info
$userInfo = "SELECT * FROM `user` WHERE `username` = '$usern';";

$result = mysqli_query($connection, $userInfo);
$resultCheck = mysqli_query($connection, $userInfo);
?>
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
    <a href="index_useradmin.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
    <hr>
    <div class="logout" style="text-align:right"><a href="logout.php">Log Out</a></div>

    <form id="form-submit" action="confirm_editUser.php" method="post" class="formLayout">
        <div class="col-md-6">
        <fieldset>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    
                        <label for="username">Username :</label>
                        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>">
                    
                <?php } ?>
                        <br><br>
                    
                        <label for="password" class="tooltip">Password :
                            <span class="tooltiptext">Minimum 8 characters</span>
                        </label>
                    <input type="password" id="pwd" name="pwd" minlength="8"><br><br>
                
                    <label for="firstname">First Name :</label>
                    <input type="text" id="fname" name="fname"><br><br>
                
                    <label for="lastname">Last Name :</label>
                    <input type="text" id="lname" name="lname"><br><br>
                
                    <label for="dateofbirth">Date of Birth :</label>
                    <input type="date" id="dob" name="dob"><br><br>
                
                    <label for="email" class="tooltip">Email :
                        <span class="tooltiptext">UOW email</span>
                    </label>
                    <input type="text" id="email" name="email"><br><br>
                
                    <label for="roleid">Role :</label><br>
                    <b style = "float:left;">Student</b>
                    <input type="radio" id="roleStud" name="role" value="0"  style = "float:right;"><br>
                    <b style = "float:left;">Staff</b>
                    <input type="radio" id="roleStaf" name="role" value="1"style = "float:right;"><br>
                    <b style = "float:left;">User Admin</b>
                    <input type="radio" id="roleAdmin" name="role" value="2"style = "float:right;">
                    <br><br>
                
                    <label for="status">Status :</label><br>
                    <td id="displayStat">
                    <b style = "float:left;">Active</b>
                    <input type="radio" id="statusActive" name="status" value="Active" style = "float:right;"><br>
                    <b style = "float:left;">Inactive</b>
                    <input type="radio" id="statusInactive" name="status" value="Inactive" style = "float:right;">
                    <br><br>
                
                
                    
                    <button type="submit" id='submit' class="btn" name="submit" style = "width: 70px">Submit</button>
                    <button type="reset" value="Reset" style = "width: 70px">Reset</button>
                    
                
            </fieldset>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // without button
    $(function() {

        var usernam = $("#username").val();

        var m;

        $.ajax({
                type: "POST",
                url: "getUserInfo.php",
                data: "username=" + usernam,
                dataType: 'json',
                success: function(data) {
                    m = data;


                } // End of first success
            }) // End of first ajax
            .done(function(data) {
                m = data;

                $("input[name='pwd']").val(m[0]['password']);
                $("input[name='fname']").val(m[0]['first_name']);
                $("input[name='lname']").val(m[0]['last_name']);
                $("input[name='dob']").val(m[0]['dob']);
                $("input[name='email']").val(m[0]['email']);

                // Set radio button of role
                if (m[0]['role_id'] == '0')
                    $("#roleStud").prop("checked", true);
                else if (m[0]['role_id'] == '1')
                    $("#roleStaf").prop("checked", true);
                else
                    $("#roleAdmin").prop("checked", true);

                // Set radio button of status
                if (m[0]['status'].toLowerCase() == 'active')
                    $("#statusActive").prop("checked", true);
                else
                    $("#statusInactive").prop("checked", true);

            }); // End of first ajax complete


        function myCallback(r1, r2, r3) {
            // m = r1 // get book time
            // o1 = r2 //get time range
            // o2 = r3 // get get time intervals
            var xhtml = [];
            var no = 0;
            var emp = ' ';
            $("#timing").html(emp);


        }
    });
</script>

</html>
<?php $connection->close(); ?>