<?php
require_once 'connection.php';

function getAllDoctors() {
    global $conn;
    $result = $conn->query("SELECT * FROM doctors");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
