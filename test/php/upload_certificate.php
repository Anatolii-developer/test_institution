<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '../uploads/certificates/';
    $username = htmlspecialchars($_SESSION['username']);
    $userDir = $uploadDir . $username;

   
    if (!is_dir($userDir)) {
        mkdir($userDir, 0777, true);
    }

    $file = $_FILES['certificate'];
    $fileName = basename($file['name']);
    $targetFile = $userDir . '/' . $fileName;

    
    $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
    if (!in_array($file['type'], $allowedTypes)) {
        die('Invalid file type. Only PDF, JPG, and PNG are allowed.');
    }

    
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        header("Location: ../personal_account.php");
        exit();
    } else {
        die('Error uploading file.');
    }
}
?>
