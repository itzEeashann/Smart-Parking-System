<?php
    include_once 'db.php';
    $sql = "DELETE FROM parking WHERE parking_id='" . $_GET["parking_id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Parking Deleted!'); window.location.href='home-admin.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

