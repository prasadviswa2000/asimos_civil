<?php

session_start();
if(isset($_SESSION["civil_id"])){
$showAlert = false;
$showError = false;
$exists=false;
	// Include file which makes the
	// Database Connection.
	include 'dbconnect_civil.php';

	$civil_id = $_SESSION["civil_id"];
    $phone = $_SESSION["phone"];
	$email = $_SESSION["email"];
	$user_name = $_SESSION["user_name"];
	$payment_status = "false";
	$status = "false";
	$true = "true";
	$false = "false";
				
	// $sql = "Select * from workshop_data where phone='$phone'";
	
	// $result = mysqli_query($conn, $sql);
	
	// $num = mysqli_num_rows($result);
	

	// if($num == 0) {
		if(($phone != NULL) && $exists==false) {			
			$status = "true";
			$sql = "INSERT INTO `workshop_data` (`civil_id`,`user_name`,`email`, `phone` , `payment_status`, `custom_data`, `timestamp`, `workshop1_bim`, `worshop2_steel`, `worshop3_ultra`) VALUES ('$civil_id','$user_name','$email','$phone','$payment_status',current_timestamp(),current_timestamp(),'$false','$true','$false')";
	
			$result = mysqli_query($conn, $sql);
	
			if ($result) {
				session_start();
				$_SESSION["steel_workshop_status"]=$status;
				$_SESSION["steel_workshop_payment_status"]="false";
				$showAlert = true;
			}
		}
		else {
			$showError = "Kindly login/ Signup !";
		}	
	// }
	
// if($num>0)
// {
// 	$exists="Already Registered for Steel Workshop !";
// }


?>
<!doctype html>
	<body>
	<?php
	
		if($showAlert) {
			echo '<script>alert(" Success!\n Your have registered for Steel Workshop !\n Your civil ID is '.$civil_id.'"); window.location.href="index.php";</script>';
		}
	
		if($showError) {
			echo '<script>alert("'.$showError.'"); window.location.href="index.php";</script>';
		}
		
		if($exists) {
			echo '<script>alert("'.$exists.'"); window.location.href="index.php";</script>';
		}
	?>
	
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous">
</script>
	
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous">
</script>
	
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
	crossorigin="anonymous">
</script>
</body>
</html><?php }
else {
	echo '<script>alert("Kindly Sign up/login !"); window.location.href="index.php";</script>';
} ?>