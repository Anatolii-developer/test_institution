<?php

$host = 'localhost'; 
$dbname = 'your_database_name'; 
$username = 'your_username'; 
$password = 'your_password'; 

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
    die('Ошибка подключения: ' . $db->connect_error);
}

$db->set_charset('utf8mb4');
?>
