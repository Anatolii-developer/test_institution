<?php
session_start();


function load_users()
{
    return file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];
}

function save_user($username, $password, $email)
{
    $user_data = [
        "username" => $username,
        "password" => password_hash($password, PASSWORD_DEFAULT), 
        "email" => $email,
    ];


    $users = load_users();

    $users[$username] = $user_data;


    file_put_contents('users.json', json_encode($users));
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'] ?? null;

    if ($action === "register") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = load_users();

        if (isset($users[$username])) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            save_user($username, $password, $email);
            echo "<script>alert('Registration successful! Please log in.');</script>";
            header("Location: ../index.php");
            exit();
        }
    } elseif ($action === "login") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $users = load_users();

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            $_SESSION['username'] = $username;
            header("Location: ../personal_account.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    }
}
?>
