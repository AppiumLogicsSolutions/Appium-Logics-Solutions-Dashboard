<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appium_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists
    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the password and redirect to confirmPassword.html
        echo "<script>
            alert('Your password is: " . $row['password'] . "');
            window.location.href = 'ConfirmPassword.html';
        </script>";
    } else {
        echo "<script>alert('Email not found.');</script>";
    }
}

$conn->close();
?>
