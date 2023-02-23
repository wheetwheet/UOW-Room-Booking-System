<?php

require ('readDB.php');
require 'session.php';

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

    <form id="form-submit" action="confirm_addUser.php" method="post" class="formLayout" ?>
        <div class="col-md-6">
        <fieldset>
            <label for="username">Username :</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="password" class="tooltip">Password :
                <span class="tooltiptext">Minimum 8 character</span>
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
            <input type="radio" id="roleStud" name="role" value="0" checked style = "float:right;"><br>
            <b style = "float:left;">Staff</b>
            <input type="radio" id="roleStaf" name="role" value="1"style = "float:right;"><br>
            <b style = "float:left;">User Admin</b>
            <input type="radio" id="roleAdmin" name="role" value="2"style = "float:right;">
            <br><br>

            <button type="submit" id='submit' class="btn" name="submit"style = "width: 70px;" >Submit</button>
            <button type="reset" value="Reset" style = "width: 70px">Reset</button>
                    
                
        </fieldset>
        </div>
    </form>
</body>

</html>