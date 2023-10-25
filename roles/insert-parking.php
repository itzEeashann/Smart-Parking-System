<?php
	include('db.php'); 
	if (isset($_POST['submit'])){
        $parking_level = $_POST['parking_level'];
        $parking_zone = $_POST['parking_zone'];
        $parking_type = $_POST['parking_type'];

        $sql="insert into parking(parking_level,parking_zone,parking_type) values('$parking_level','$parking_zone','$parking_type')";

        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Parking Spot Info Added'); window.location.href='home-admin.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>