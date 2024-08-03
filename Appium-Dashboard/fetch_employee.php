<?php
include 'db.php';

if (isset($_GET['employee_id'])) {
    $employee_id = $conn->real_escape_string($_GET['employee_id']);

    $sql = "SELECT name FROM users WHERE id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["name" => "Unknown Employee"]);
    }
} else {
    echo json_encode(["name" => "No ID provided"]);
}

$conn->close();
?>
