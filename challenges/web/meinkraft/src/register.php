<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="landing-wrapper">
	<div class="topnav">
		<a id="activepage" href="register.php">Register</a>
		<a href="login.php">Login</a>
	</div>

<h1>very trustworthy meinkraft registration page</h1>
<p>because we are so trustworthy and reliable we have a ton of users so it might be hard to find a unique username and password because we are just too popular.</p>
<div>
    <form class="form" method="post" name="login">
        <h2 class="login-title">make an account</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="ENTER" name="Login" class="login-button"/>
  </form>
<?php
   if (isset($_POST['username'])) {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
	$rotted_password = str_rot13($password);
	echo "
	<div class=\"error\">
		<p>unfortunately that password has been taken by user $rotted_password pls try again sorry</p>
	</div>";
   }
?>
  <div class="footer">
    <img src="https://www.pngitem.com/pimgs/m/23-232154_diamond-ore-block-x-ray-minecraft-1-14-hd.png" class="photofooter">
    <p>COPYRIGHT MEINKRAFT NO STEALING OR ELSE YOU WILL BE PUNTED ACROSS THE WORLD BECAUSE PLAGIARISM IS ILLEGAL</p>
  </div>
</div>
</body>
</html>
