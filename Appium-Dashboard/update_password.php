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
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Debugging: Print received email
    echo "Received email: $email";

    // Check if passwords match
    if ($new_password === $confirm_password) {
        // Securely update password in the database
        $email_escaped = $conn->real_escape_string($email);
        $new_password_escaped = $conn->real_escape_string($new_password);

        // Update password in the database
        $sql = "UPDATE users SET password='$new_password_escaped' WHERE email='$email_escaped'";
        echo "SQL query: $sql";  // Debugging: Print SQL query

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Password updated successfully.');
                window.location.href = 'index.html';
            </script>";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "<script>
            alert('Passwords do not match.');
            window.history.back();
        </script>";
    }
}

$conn->close();
?>
