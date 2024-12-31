<?php
session_start();

//if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
//    header("Location: ../index.php");
//    exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./admin.css">
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#" onclick="showContent(event, 'dashboard')">Dashboard</a>
            <a href="#" onclick="showContent(event, 'user-management')">User Management</a>
            <a href="#" onclick="showContent(event, 'content-management')">Content Management</a>
            <a href="#" onclick="showContent(event, 'certificate-management')">Certificate Management</a>
            <a href="#" onclick="showContent(event, 'practice-logs')">Practice Logs</a>
        </div>
        <div class="main-content">
        <div id="dashboard" class="content-section">
    <h2>Dashboard</h2>
    <p>Обзор ключевой информации:</p>
    <ul>
        <li>Total Users: <span id="total-users">Loading...</span></li>
        <li>Total Videos: <span id="total-videos">Loading...</span></li>
        <li>Total Books: <span id="total-books">Loading...</span></li>
        <li>Certificates Issued: <span id="total-certificates">Loading...</span></li>
    </ul>
</div>

<div id="user-management" class="content-section" style="display:none;">
    <h2>User Management</h2>
    <button onclick="addUser()">Add User</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="user-table">
        </tbody>
    </table>
</div>

<div id="content-management" class="content-section" style="display:none;">
    <h2>Content Management</h2>
    <h3>Videos</h3>
    <form id="video-upload-form" action="upload_video.php" method="POST" enctype="multipart/form-data">
        <label for="video">Upload Video:</label>
        <input type="file" id="video" name="video" accept="video/*" required>
        <button type="submit">Upload</button>
    </form>
    <h3>Books</h3>
    <form id="book-upload-form" action="upload_book.php" method="POST" enctype="multipart/form-data">
        <label for="book">Upload Book:</label>
        <input type="file" id="book" name="book" accept=".pdf" required>
        <button type="submit">Upload</button>
    </form>
</div>

            <div id="certificate-management" class="content-section" style="display:none;">
                <h2>Certificate Management</h2>
                <p>Загрузка и управление сертификатами.</p>
            </div>
            <div id="practice-logs" class="content-section" style="display:none;">
    <h2>Practice Logs</h2>
    <p>Manage and track practice logs. Generate reports:</p>
    <button onclick="generatePracticeReport()">Generate Report</button>
</div>

        </div>
    </div>
    <script src="../js/admin.js"></script>
</body>
</html>
