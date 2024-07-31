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
    $password = $_POST['password'];

    $email_escaped = $conn->real_escape_string($email);

    $sql = "SELECT password FROM users WHERE email='$email_escaped'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            echo "<script>
                alert('Login successful.');
                window.location.href = 'Attendance1.html';
            </script>";
        } else {
            echo "<script>
                alert('Incorrect password.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Email not found.');
            window.history.back();
        </script>";
    }
}

$conn->close();
?>
