<?php
include 'db.php';

$searchTerm = $_GET['searchTerm'];
$sql = "SELECT * FROM team_members WHERE name LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$members = [];
while ($row = $result->fetch_assoc()) {
  $members[] = $row;
}

echo json_encode($members);
?>
