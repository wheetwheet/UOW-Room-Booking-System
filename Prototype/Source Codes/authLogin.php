<?php

// Include session and connection file
require 'session.php';
require 'readDB.php';
require 'functions.php';

// Check login button status
if (isset($_POST['login'])) {
  login();
}

// Login function
function login()
{
  // Make connection variable global
  global $connection;

  // Local variables
  $u_name = trim($_POST['userid']);
  $pass = trim($_POST['password']);
  $type = ($_POST['kind']);


  // check whether required fields are empty
  if (!empty($u_name) and !empty($pass) and !empty($type)) {
    // Create sql statement
    $sql = "select * from user where username = '$u_name' and password = '$pass'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
      // Get num of results from jQuery
      $rowsCount = mysqli_num_rows($result);

      // Check whether rowsCount == 1
      if ($rowsCount == 1) {

        $found_user = mysqli_fetch_array($result);

        if(strtolower($found_user['status']) == 'active')
        {

          // Get current date and time
          date_default_timezone_set("Asia/Singapore");

          $d = strtotime("now");
          $dt = date("Y-m-d H:i:s", $d);

          // Update login time if login credentials match
          $updateLogin = "UPDATE `user`";
          $updateLogin .= "SET `login_datetime` = '$dt'";
          $updateLogin .= "WHERE `username` = '$u_name' and `password` = '$pass';";

          // Check if update login_datetime is successful
          if (!mysqli_query($connection, $updateLogin)) {
            echo "Error: " . $updateLogin . "<br>" . mysqli_error($connection);
          }

          

          // Fill session variable with values
          $_SESSION['log_id'] = $found_user['username'];
          $_SESSION['f_name'] = $found_user['first_name'];
          $_SESSION['l_name'] = $found_user['last_name'];

          // Get role of user
          $roleTemp = checkRole($found_user['role_id']);

          // Fill in session variable role
          $_SESSION['role'] = $roleTemp;

          if ($type == "staff") {
            if ($roleTemp == "admin") {
              header('location: index_staff.php');
            } else if ($roleTemp == "user admin") {
              header('location: index_useradmin.php');
            } else {
              header('location: home.php');
            }
          } else {
            header('location: index_student.php');
          }
        }
        else
        {
          ?>
          <script>
            alert("Login failed. Contact your administrator.");
            window.location = "home.php";
          </script>
          <?php

        }
      } else {
        ?>
        <script>
          alert("Wrong username/password combination");
          window.location = "home.php";
        </script>
        <?php


      }
      $connection->close();
    } else {
      // Error if wrong username and password combination
      //echo ("Connection to server failed. Contact Your administrator. \n");
    }
  } else {
    header('location: home.php');
  }
}

// Check role function
function checkRole($role)
{
  // Make connection variable global
  global $connection;

  // Parse role into variable temp
  $temp = $role;

  // Create sql statement
  $sql = "select * from role where role_id = '$temp'";
  $roleResult = mysqli_query($connection, $sql);

  if ($roleResult) {
    $roleCount = mysqli_num_rows($roleResult);

    // Check if roleCount == 1
    if ($roleCount == 1) {
      $found_role = mysqli_fetch_array($roleResult);

      // Return role variable
      $role = $found_role['description'];
    }
  } else {
    header('location: home.php');
  }

  return $role;
}
