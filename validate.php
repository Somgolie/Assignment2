<?php
session_start();
require_once('user.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$_SESSION['username'] = $username;

$user = new User();
$user_data = $user->get_user_by_username($username);

if ($user_data && password_verify($password, $user_data['password'])) {
    $_SESSION['authenticated'] = 1;
    header("Location: /");
    exit();
} else {
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 1;
    } else {
        $_SESSION['attempts'] += 1;
    }
    header("Location: /login.php");
    exit();
}