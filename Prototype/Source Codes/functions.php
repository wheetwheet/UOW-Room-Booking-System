<?php

// redirect if logged_in == true
function redirect_page()
{
  if ($_SESSION['role'] == "admin")
  {
    header('location: index_staff.php');
    return isset($_SESSION['log_id']);
  }
  else if ($_SESSION['role'] == "user admin")
  {
    header('location: index_useradmin.php');
    return isset($_SESSION['log_id']);
  }
  else
  {
    header('location: home.php');
    return isset($_SESSION['log_id']);
  }
}

function displaySelect($xstr)
{
	if($xstr == 'Y')
	{
		echo '<option value="'. $xstr. '">Yes</option>';
		echo '<option value="N">No</option>';
	}
	else
	{
		echo '<option value="'. $xstr. '">No</option>';
		echo '<option value="Y">Yes</option>';
	}
}


function splitTime($StartTime, $EndTime, $Duration = "60", $p)
{
  $ReturnArray = array(); // Define output
  $StartTime    = strtotime($StartTime); //Get Timestamp
  $EndTime      = strtotime($EndTime); //Get Timestamp
  $timeDiff = ($EndTime - $StartTime) / 60;
  $AddMins  = $Duration * 60;

  /*
	for($i = 0; $i < $timeDiff; $i++)
	{
		
		
		for($j = 0; $j < (sizeof($p)); $j++)
		{
			if(
		}
		
	}
	*/
  // Populate the $ReturnArray with values
  while ($StartTime <= $EndTime) //Run loop
  {
    $ReturnArray[] = date("H:i", $StartTime);
    $StartTime += $AddMins; //Endtime check
  }

  $final = array();

  for ($i = 0; $i < $timeDiff; $i++) {


    for ($j = 0; $j < (sizeof($p)); $j++) {
      if ($ReturnArray[$i] == $p[$j]) {
        $i += 1;
        continue;
      } else {
        $a = array($ReturnArray[$i], $ReturnArray[$i + 1]);
        $final[$i] = implode(".", $a);
        //echo implode(".", $a);
        echo $final[$i];
        $i += 1;
      }
    }
  }
  return $final;
}

function splitTime2($StartTime, $EndTime, $Duration = "60")
{
  $ReturnArray = array(); // Define output
  $StartTime    = strtotime($StartTime); //Get Timestamp
  $EndTime      = strtotime($EndTime); //Get Timestamp
  $timeDiff = ($EndTime - $StartTime) / 60;
  $AddMins  = $Duration * 60;

  while ($StartTime <= $EndTime) //Run loop
  {
    $ReturnArray[] = date("H:i", $StartTime);
    $StartTime += $AddMins; //Endtime check
  }

  $ori = array();

  for ($i = 0; $i < $timeDiff; $i++) {
    $a = array($ReturnArray[$i], $ReturnArray[$i + 1]);
    $ori[$i] = implode(".", $a);
    //echo implode(".", $a);
    //$i += 1;
  }
  return $ori;
}

function splitTime3($StartTime, $EndTime, $Duration = "60")
{
  $ReturnArray = array(); // Define output
  $StartTime    = strtotime($StartTime); //Get Timestamp
  $EndTime      = strtotime($EndTime); //Get Timestamp
  $timeDiff = ($EndTime - $StartTime) / 60;
  $AddMins  = $Duration * 60;

  while ($StartTime <= $EndTime) //Run loop
  {
    $ReturnArray[] = date("H:i", $StartTime);
    $StartTime += $AddMins; //Endtime check
  }

  return $ReturnArray;
}

$error = array();
/*
function display_error()
{
	
}
*/

?>
