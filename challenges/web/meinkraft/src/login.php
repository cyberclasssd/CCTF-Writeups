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
		<a href="register.php">Register</a>
		<a id="activepage"href="login.php">Login</a>
	</div>

<?php
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if (strcasecmp ( $username , 'admin' ) == 0 && strcasecmp ( $password , 'nqzva' ) == 0) {
            // Redirect to user dashboard page
            echo "<div class='form'>
                  <h1>hello, $username</h1><br/>
                  <p>welcome, admin! here is your flag: cctf{untrustworthy_poptarts}</p>
                  </div>";
        } else if (strcasecmp ( $username, str_rot13($password)) == 0) {
            echo "<div class='form'>
                  <h1>hello, $username!</h1><br/>
                  <p>unfortunately because you are not admin you don't get flag. however you do get meinkraft!</p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h1>LOGIN FAILED</h1><br/>
                  <p>no no no no you do not get to log in stop trying to hack meinkraft.</p>
                  </div>";		
	}
    } else {
?>

<h1>very trustworthy meinkraft login page</h1>
<p>here is where our many really good really spicy users who trust us very much can log in.</p>
<div>
    <form class="form" method="post" name="login">
        <h2 class="login-title">login</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="ENTER" name="Login" class="login-button"/>
  </form>
<?php
   }
?>
  <div class="footer">
    <img src="https://www.pngitem.com/pimgs/m/23-232154_diamond-ore-block-x-ray-minecraft-1-14-hd.png" class="photofooter">
    <p>COPYRIGHT MEINKRAFT NO STEALING OR ELSE YOU WILL BE PUNTED ACROSS THE WORLD BECAUSE PLAGIARISM IS ILLEGAL</p>
  </div>
</div>
</body>
</html>
