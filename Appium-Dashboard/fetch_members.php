<?php
include 'db.php'; // Ensure this file contains the correct database connection

// Set header for JSON response
header('Content-Type: application/json');

$sql = "SELECT * FROM team_members";
$result = $conn->query($sql);

$members = [];
while ($row = $result->fetch_assoc()) {
    $members[] = $row;
}

echo json_encode($members);

$conn->close();
?>
