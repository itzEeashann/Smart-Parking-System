<?php
    include("db.php");

    $username = $_POST['username'];
    $sql = "SELECT * FROM account WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    $file_name = basename($_FILES["pic"]["name"]);

    $insert_sql = "INSERT INTO parking_proof(username,proof) VALUES ('$_POST[username]','$file_name')";

    if (mysqli_query($conn, $insert_sql)) {
        echo
        '<script>
            alert("Uploaded!");
            window.location.href = "home-user.php";
        </script>';
        die();
    }
    else {
        echo
        '<script>
            alert("Failed To Upload!");
            window.location.href = "home-user.php";
        </script>';
    }

    mysqli_close($con);
?>