<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $num = $_POST["num"];
    $password = $_POST["password"];

    if($username == "" || $gender == "" || $email == "" || $role == "" || $num == "" || $password == ""){
    echo ("<script LANGUAGE='JavaScript'> window.alert('Please fill out all the column!'); window.location.href='login.php'; </script>");
    }else{
        $conn = mysqli_connect("localhost", "root", "", "sps");

    if(!$conn){
      die("Could not connect to database: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO account (username,gender,email,role,num,password) VALUES (?, ?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $gender, $email, $role,$num, $password);

    if(mysqli_stmt_execute($stmt)){
      echo ("<script LANGUAGE='JavaScript'> window.alert('Registered Sucessfully!'); window.location.href='login.php';</script>");
      } else {
        echo "Error registering: " . mysqli_stmt_error($stmt);
      }
  
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }
?>