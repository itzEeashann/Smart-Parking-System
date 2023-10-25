<?php
$db = new mysqli('localhost', 'root', '', 'sps');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT car_num FROM parking_history";
$result = $db->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>