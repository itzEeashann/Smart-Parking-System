<?php
	include('db.php'); 
	if (isset($_POST['submit'])){
		$rate_id = $_POST['rate_id'];
        $parking_time = $_POST['parking_time'];
        $fees_day = $_POST['fees_day'];
        $fees_end = $_POST['fees_end'];

		$sql = "UPDATE parking_rates SET rate_id='$_POST[rate_id]', parking_time='$_POST[parking_time]', fees_day='$_POST[fees_day]', fees_end='$_POST[fees_end]' WHERE rate_id='$_POST[rate_id]'";
        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Parking Spot Info Updated'); window.location.href='home-admin.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>