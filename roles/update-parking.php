<?php
	include('db.php'); 
	if (isset($_POST['submit'])){
		$parking_id = $_POST['parking_id'];
        $parking_level = $_POST['parking_level'];
        $parking_zone = $_POST['parking_zone'];

		$sql = "UPDATE parking SET parking_id='$_POST[parking_id]', parking_zone='$_POST[parking_zone]', parking_level='$_POST[parking_level]' WHERE parking_id='$_POST[parking_id]'";
        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Parking Spot Info Updated'); window.location.href='home-admin.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>