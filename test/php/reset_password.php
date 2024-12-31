<?php
session_start();
include "../templates/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $new_password = $_POST['password'];

    $users = file_exists("../users.json") ? json_decode(file_get_contents("../users.json"), true) : [];

    if (isset($users[$username])) {
        $users[$username]['password'] = password_hash($new_password, PASSWORD_DEFAULT);
        file_put_contents("../users.json", json_encode($users));

        echo "<div class='container' style='text-align: center; color: green;'>
                Password successfully reset! <a href='../index.php'>Login here</a>
              </div>";
        exit();
    } else {
        echo "<div class='container' style='text-align: center; color: red;'>Invalid request.</div>";
    }
}

// Show password reset form
if (isset($_GET['user'])) {
    $username = htmlspecialchars($_GET['user']);
    ?>
    <div class="container">
        <h1>Reset Password</h1>
        <form action="reset_password.php" method="POST">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <label for="password">Enter New Password:</label>
            <input type="password" name="password" placeholder="New Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
    <?php
} else {
    echo "<div class='container' style='text-align: center; color: red;'>Invalid reset link.</div>";
}
include "../templates/footer.php";
?>
