<?php
if (isset($_POST['search'])) {
    $car_num = $_POST['car_num'];

    include_once('db.php');

    $query = "SELECT * FROM parking WHERE car_num = '$car_num'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $parking_level = $row['parking_level'];
        $parking_zone = $row['parking_zone'];

        echo "<script>";
        echo "alert('Parking Details\\nCar Registration Number: $car_num\\nParking Level: $parking_level\\nParking Zone: $parking_zone');";
        echo "window.location.href = 'home-user.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('No car found with the registration number: $car_num');";
        echo "window.location.href = 'home-user.php';";
        echo "</script>";
    }
    mysqli_close($conn);
}
?>

