<!DOCTYPE html>
<?php
setcookie('admin', 'False', time() + (86400 * 30));
?>
<html>

<head>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>

<?php
if(isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'True') {
    echo "<h1>costco storage room</h1>
	<div>
		<p>bro literally the cookies are right outside. cctf{ask_nic3ly_4nd_you11_g3t_c00k13s}</p>
		<p class='link'><a href='index.php'>Return to login page</p>
	</div>
	";
} else {
    echo "
<h1>costco storage room</h1>
<div>
<p>dear bro, you don't have permission to be in here! no flag for you >:c</p>
<p class='link'><a href='index.php'>Return to login page</p>
</div>
";
}
?>

</body>
</html>
