<?php
require 'db.php';

$db->query("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('user', 'admin', 'supervisor') DEFAULT 'user'
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS videos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        category VARCHAR(255),
        file_path VARCHAR(255),
        visibility ENUM('public', 'private', 'restricted') DEFAULT 'public'
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS books (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        category VARCHAR(255),
        file_path VARCHAR(255),
        visibility ENUM('public', 'private', 'restricted') DEFAULT 'public'
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS certificates (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        file_path VARCHAR(255),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS practice_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        lectures_conducted INT DEFAULT 0,
        lectures_attended INT DEFAULT 0,
        groups_conducted INT DEFAULT 0,
        supervisions_conducted INT DEFAULT 0,
        supervisions_attended INT DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )
");

echo "База данных и таблицы успешно созданы!";
?>
