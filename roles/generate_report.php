<?php
if (isset($_POST['generate_report'])) {
    $db = new mysqli('localhost', 'root', '', 'sps');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT * FROM parking_history";
    $result = $db->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $html = "<html>
    <head>
        <style>
            body {
                text-align: center;
            }
            table {
                margin: 0 auto;
                border-collapse: collapse;
                width: 70%;
                border: 1px solid #ddd;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>Parking History Report</h1>
        <table>
            <tr>
                <th>Parking ID</th>
                <th>Car Number</th>
                <th>Username</th>
                <th>Parking Time</th>
            </tr>";

    foreach ($data as $row) {
        $html .= "<tr>
                    <td>{$row['parking_id']}</td>
                    <td>{$row['car_num']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['parking_time']}</td>
                  </tr>";
    }
    $html .= "</table>
    </body>
</html>";

    echo $html;
} else {
    echo "No report requested.";
}
?>
