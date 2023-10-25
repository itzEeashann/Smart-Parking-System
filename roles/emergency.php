<?php
	include('db.php'); 
	if (isset($_POST['emergency'])){
        $username = $_POST['username'];
        $sql="insert into emergency(username) values('$username')";

        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Help is Arriving!'); window.location.href='home-user.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>