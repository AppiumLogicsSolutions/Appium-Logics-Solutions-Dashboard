<?php
include 'db.php'; // Ensure this file contains the correct database connection

// Make sure to set the header for JSON response
header('Content-Type: application/json');

// Retrieve and sanitize input values
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$profession = isset($_POST['profession']) ? htmlspecialchars($_POST['profession']) : '';
$profile_image = isset($_POST['profile_image']) ? htmlspecialchars($_POST['profile_image']) : '';

// Check if all required fields are provided
if ($name && $profession && $profile_image) {
    // Add your code to insert the data into the database
    $sql = "INSERT INTO team_members (name, profession, profile_image) VALUES ('$name', '$profession', '$profile_image')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'New member added successfully']);
    } else {
        echo json_encode(['message' => 'Error: ' . $conn->error]);
    }
} else {
    echo json_encode(['message' => 'Required fields are missing']);
}

$conn->close();
?>
