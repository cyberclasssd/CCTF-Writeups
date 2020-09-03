<?php
// set the expiration date to one hour ago
setcookie("admin", "", time() - 3600);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
<?php
    if (isset($_POST['username'])) {
        $_SESSION['username'] = $username;
        // Redirect to user dashboard page
        header("Location: cookies.php");
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>  </form>
<?php
    }
?>
</body>
</html>
