<?php
if (isset($_POST['search'])) {
    $username = $_POST['username'];

    include_once('db.php');

    $query = "SELECT * FROM parking WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $parking_level = $row['parking_level'];
        $parking_zone = $row['parking_zone'];

        echo "<script>";
        echo "alert('Parking Details\\nUsername: $username\\nParking Level: $parking_level\\nParking Zone: $parking_zone');";
        echo "window.location.href = 'home-guard.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('No username was found!: $username');";
        echo "window.location.href = 'home-guard.php';";
        echo "</script>";
    }
    mysqli_close($conn);
}
?>
