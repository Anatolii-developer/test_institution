<?php
require '../db.php';

$result = $db->query("SELECT id, username, role FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);
header('Content-Type: application/json');
echo json_encode($users);
?>

