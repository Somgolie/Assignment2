<?php 
session_start();
if (isset($_SESSION['authenticated'])){
  header("Location: /index.php");
}
if(!isset($_SESSION['attempts'])){
echo "";
}
else{
  echo "Incorrect username or password. You have tried " . $_SESSION['attempts'] . " times.";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Log in</title>
</head>
<body>

<h1>Log in to your account</h1>
<form action="/validate.php" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" ><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" ><br><br>
  <input type="submit" value="Submit">
</form> 
  <p><a href='./logout.php'>Create Account Here!</a></p>

</body>
</html> 
