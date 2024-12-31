<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}

$user = htmlspecialchars($_SESSION['username']);
$history = htmlspecialchars($_POST['history'] ?? '');
$expectations = htmlspecialchars($_POST['expectations'] ?? '');
$goals = htmlspecialchars($_POST['goals'] ?? '');


$file = 'career_planning.json';
$data = [
    'user' => $user,
    'history' => $history,
    'expectations' => $expectations,
    'goals' => $goals,
];

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), FILE_APPEND);

echo "Form submitted successfully!";
?>
