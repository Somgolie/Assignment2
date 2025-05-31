<?php
session_start();

$valid_username = "Admin";
$valid_password = "Fish";

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;
$password = $_REQUEST['password'];


if ($username == $valid_username && $password == $valid_password) {
    $_SESSION['authenticated'] = 1;
    header("Location: /");
}
else{
    if(!isset($_SESSION['attempts'])){
      $_SESSION['attempts'] = 1; 
    }else{
      $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
    }
    header("Location: /login.php");


}
?>