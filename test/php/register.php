<?php include "../templates/header.php"; ?>
<div class="container">
    <h1>Register</h1>
    <form action="./authenticate.php" method="POST">
        <input type="hidden" name="action" value="register">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="../index.php">Login here</a></p>
</div>
<?php include "../templates/footer.php"; ?>
