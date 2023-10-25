<?php
include_once('db.php');
$sql = "SELECT parking_time FROM parking WHERE user_id = 123"; // Assuming user_id 123 is the user in question
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $parking_time = $row['parking_time'];

    $start_datetime = new DateTime($parking_time);
    
    $current_datetime = new DateTime();

    $interval = $start_datetime->diff($current_datetime);
    $hours_parked = $interval->h;

    echo "$hours_parked";
} else {
    echo "No record found for user.";
}
?>
