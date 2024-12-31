<?php
session_start();

$admin_username = 'admin';
$admin_password = 'admin123'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../db.php'; 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, role FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($id, $role);
    $stmt->fetch();

    if ($role === 'admin') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: index.php");
        exit();
    } else {
        echo "Access Denied!";
    }
}
?>
