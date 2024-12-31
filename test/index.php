<?php include "./templates/header.php"; ?>
<div class="container login-container">
    <h1>Login</h1>
    <form action="./php/authenticate.php" method="POST">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="./php/register.php">Register here</a></p>
    <p><a href="./php/forget_password.php">Forgot Password?</a></p>

</div>
<?php include "./templates/footer.php"; ?>
