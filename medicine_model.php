<?php
require_once 'connection.php';

function getAllMedicines() {
    global $conn;
    $result = $conn->query("SELECT * FROM medicines");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
