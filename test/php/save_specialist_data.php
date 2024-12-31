<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'supervisor') {
    die("Unauthorized access");
}

$data = [
    'email' => htmlspecialchars($_POST['email']),
    'phone' => htmlspecialchars($_POST['phone']),
    'dob' => htmlspecialchars($_POST['dob']),
    'other_education' => htmlspecialchars($_POST['other_education']),
    'professional_societies' => htmlspecialchars($_POST['professional_societies']),
    'education_hours' => htmlspecialchars($_POST['education_hours']),
    'personal_therapy' => htmlspecialchars($_POST['personal_therapy']),
    'supervision_hours' => htmlspecialchars($_POST['supervision_hours']),
    'teaching_experience' => htmlspecialchars($_POST['teaching_experience']),
    'therapeutic_approaches' => htmlspecialchars($_POST['therapeutic_approaches']),
    'crisis_counseling' => htmlspecialchars($_POST['crisis_counseling']),
    'evaluation' => htmlspecialchars($_POST['evaluation']),
    'crisis_support' => htmlspecialchars($_POST['crisis_support']),
];

$file = 'specialist_data.json';
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), FILE_APPEND);

echo "Specialist information saved successfully!";
?>
