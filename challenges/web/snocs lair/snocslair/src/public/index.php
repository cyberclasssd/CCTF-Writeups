<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('/var/www/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        
        $result = mysqli_query($con, "SELECT * FROM L4KkBKiMvIMffILJJk0lPmRMjkzSrPY8ydanBov2cBjBeSXU1DO WHERE username='".$_POST["username"]."' AND password='".$_POST["password"]."';");
        
		if(!$result) {
			echo "You have an error in your SQL syntax";
		}
        $rows = mysqli_fetch_array($result);

        if ($rows > 0) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h1>GET OUTTTT!!!!</h1><br/>
                  <p class='link'><a href='index.php'>Okay.</a> I'm sorry, Snocci. Pls spare me.</p>
                  </div>";
        }
    } else {
?>

<h1>Snocci's lair.</h1>
<h2> Hello!, intruder! You have been detected!!</h2>
<h2>In order to get the credentials for entrance, you must hand over 100,000,000^99999999 strawberry popsicles. Nobody has that many strawberry popsicles. Guess you can't enter~</h2>
<div>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Le Entrance</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="ENTER" name="Login" class="login-button"/>
  </form>
<?php
    }
?>
</body>
</html>
