<?php 
session_start();
if (!isset($_SESSION['authenticated'])){
  header("Location: /login.php");
}
$current_date = date("l, F j, Y");
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>

<h1>Assignment 1</h1>
  <p> Welcome Back, <?=$_SESSION['username'] ?></p>
  <p> Today is <?=$current_date?></p>

</body>
  <footer>
    <p><a href='./logout.php'>Log out Here!</a></p>
  </footer>
</html> 