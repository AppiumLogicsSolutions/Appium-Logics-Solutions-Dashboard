<?php
include 'db.php';

$sql = "SELECT employees.name, attendance.employee_id, attendance.status, attendance.absents, attendance.overtime_hours 
        FROM attendance 
        INNER JOIN employees ON attendance.employee_id = employees.id"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $attendanceRecords = [];
    while($row = $result->fetch_assoc()) {
        $attendanceRecords[] = $row;
    }
    echo json_encode($attendanceRecords);
} else {
    echo json_encode([]);
}

$conn->close();
?>
