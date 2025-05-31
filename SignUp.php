<?php  
require_once('user.php');
session_start();
session_destroy();

$user = new User();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($user->create_user($username, $hashedPassword)) {
            // Redirect to index.php
            header("Location: index.php");
            exit(); // Stop script execution after redirect
        } else {
            $message = "Failed to create account.";
        }
    } else {
        $message = "Please fill in both fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h1>Create an Account</h1>
<?php if (!empty($message)): ?>
  <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form action="" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Submit">
</form> 

</body>
</html>
