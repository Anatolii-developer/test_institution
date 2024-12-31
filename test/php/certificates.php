<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}

$uploadDir = '../uploads/certificates/';
$username = htmlspecialchars($_SESSION['username']);
$userDir = $uploadDir . $username;

$uploadedCertificates = [];

if (is_dir($userDir)) {
    $uploadedCertificates = array_diff(scandir($userDir), ['.', '..']);
}

if (empty($uploadedCertificates)) {
    echo '<p>No certificates uploaded yet.</p>';
} else {
    echo '<ul>';
    foreach ($uploadedCertificates as $certificate) {
        $filePath = $userDir . '/' . $certificate;
        echo '<li><a href="' . $filePath . '" target="_blank">' . htmlspecialchars($certificate) . '</a></li>';
    }
    echo '</ul>';
}
?>
