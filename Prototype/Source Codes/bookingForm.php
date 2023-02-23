<?php
include_once('readDB.php');
require 'session.php';

$selectedBlk = strval($_GET['blk']);
$selectedFloor = $_GET['floor'];
$id = $_GET['id'];
$query = "SELECT *
FROM `room`
WHERE `blk` = '$selectedBlk' and `floor` = '$selectedFloor' and `room_num` = '$id';";
$result = mysqli_query($connection, $query);
$resultCheck = mysqli_query($connection, $query);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Booking Form Page</title>
	<style>
		.formLayout {
			background-color: #f3f3f3;
			border: solid 1px #a1a1a1;
			padding: 10px;
			width: 480px;
		}

		.formLayout label,
		.formLayout input,
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
<a href="index_student.php"><img src="logo.jpg" style="width:200px;height:150px;" alt="Home"></a>
<hr>
<hr>
<form id="form-submit" action="confirm_booking.php" method="get" class="formLayout" ?>
	<div class="col-md-6">
		<fieldset>
			<td>
				<label for="room">You have selected room : </label>
				<?php while ($row = mysqli_fetch_assoc($result)) {
				?>
					<br>
					<span name="room_id" value="<?php echo $row['room_num']; ?>"><b> <?php echo $selectedBlk. ".". $selectedFloor. ".". $row['room_num']; ?> </b></span>
					<input type="hidden" name="blk" id="blkk" value="<?php echo $selectedBlk; ?>">
					<input type="hidden" name="floor" id="fl" value="<?php echo $selectedFloor; ?>">
					<input type="hidden" name="room" id="rm" value="<?php echo $row['room_num']; ?>">
					<br><br>
					<label for="name">Name : </label>
					<br>
					<span name="nameOfUser" value="<?php echo $_SESSION['l_name'] . ' ' . $_SESSION['f_name']; ?>"><b> <?php echo $_SESSION['l_name'] . ' ' . $_SESSION['f_name']; ?> </b></span>
					<br /><br>
					<label for="UOWID"> UOW ID : </label>
					<br>
					<span name="uow_id" value="<?php echo $_SESSION['log_id']; ?>"><b> <?php echo $_SESSION['log_id']; ?> </b></span>
					<br /><br />
					<label for="dating">Date : </label>
					<input type="date" id="datepicker" name="dating">
					<br /><br />
					<label for="timing">Timing :</label>
					<select name="timing" id="timing">
						<option> - </option>
					</select>
					</br></br>
					<h1>Price : <?php echo $row['price'];
							} ?> / hour</h1>
					<label for="promo">Promo Code: </label>
					<input type="text" id="promo" name="promo">
					<br><br>
					<button type="submit" id='submit' class="btn" name="submit">Submit</button>
					<button type="reset" value="Reset">Reset</button>
			</td>
		</fieldset>
	</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="customjs.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="datepick.js"></script> -->
</body>
</html>
<?php $connection -> close() ?>