<?php
include 'db.php';
session_start(); // Start a session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            echo "<script>alert('Login successful.'); window.location.href = 'attendance2.html';</script>";
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href = 'index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href = 'index.html';</script>";
    }

    $conn->close();
}
?>
