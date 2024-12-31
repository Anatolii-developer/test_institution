<?php include "../templates/header.php"; ?>
<div class="container">
    <h1>Forgot Password</h1>
    <form action="forget_password.php" method="POST">
        <label for="username">Enter your username or email:</label>
        <input type="text" name="username" placeholder="Username or Email" required>
        <button type="submit">Send Reset Link</button>
    </form>
    <a href="../index.php">Back to Login</a>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];

    $users = file_exists("../users.json") ? json_decode(file_get_contents("../users.json"), true) : [];

    foreach ($users as $user) {
        if ($user['username'] === $username || $user['email'] === $username) {
            echo "<div style='text-align: center; color: green; margin-top: 10px;'>
                    Reset link: <a href='reset_password.php?user={$user['username']}'>Click here to reset your password</a>
                  </div>";
            return;
        }
    }
    echo "<div style='text-align: center; color: red;'>User not found.</div>";
}
?>
<?php include "../templates/footer.php"; ?>
