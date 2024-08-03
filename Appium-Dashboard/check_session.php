<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Return the logged-in user's ID
    echo json_encode(['user_id' => $_SESSION['user_id']]);
} else {
    // No user logged in
    echo json_encode(['user_id' => null]);
}
?>
