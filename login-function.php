<?php 
session_start();
 
$config = mysqli_connect('localhost', 'root', '', 'sps');
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($config,"SELECT * FROM account WHERE username='$username' AND password='$password'");
$check = mysqli_num_rows($login);

if ($check > 0) {
    $data = mysqli_fetch_assoc($login);
 
    if ($data['role'] == "user") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "user";
        header("location:roles/home-user.php");

    } elseif ($data['role'] == "member") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "member";
        header("location:roles/home-member.php");

    } elseif ($data['role'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        header("location: roles/home-admin.php");
        
    } elseif ($data['role'] == "guard") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "guard";
        header("location: roles/home-guard.php");
    } else {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
    }
} else {
    echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
}
?>
