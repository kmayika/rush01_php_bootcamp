<?php

session_start();
	include('./connect.php');
if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `users` WHERE username='$username' AND password='$password' ";
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	$count = mysqli_num_rows($result);
	
	if ($count == 1)
	{
		$_SESSION['username'] = $username;
	}
	else
	{
		echo "Invalid login credentials";
		exit;
	}
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		echo "Welcome " . $username . "!";
		echo "<a href='logout.php'>Logout</a>";
		// header('Location: benito_game');
		 
	}
}


?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="./reg.css">
</head>
<body>
	<div class="header">
		<h2>Please Login</h2>
	</div>
	<form method="post" action="login.php">
		
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username ?>">
			</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<button type="submit">Login</button>
		<a href="register.php">Register</a>
	</form>
</body>
</html>