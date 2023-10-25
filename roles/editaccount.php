<?php
	include('db.php'); 
	if (isset($_POST['submit'])){
		$username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $num = $_POST['num'];
        
		$sql = "UPDATE account SET username='$_POST[username]', gender='$_POST[gender]', email='$_POST[email]', role='$_POST[role]', password='$_POST[password]',num='$_POST[num]' WHERE username='$_POST[username]'";
        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Account Updated'); window.location.href='home-admin.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>