<?php
$username = "";
$error = array();
$db = 'db_rush01';
//create a connection'
$connection = mysqli_connect('localhost', 'root', '1911993k', 'db_rush01');
//check the connection
if (isset($_POST['reg_user']))
{
    $username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$confirm = trim($_POST['confirm_password']);
	
    //chec is there is something in the field
    if (empty($username))
    {
		echo "username required";
		exit;
    }
    if (empty($password))
    {
		echo "Please enter valid password";
		exit;
    }
    $sql_u = "SELECT * FROM `users` WHERE `username`='$username'";
  	$sql_e = "SELECT * FROM `users` WHERE `password`='$password'";
  	$res_u = mysqli_query($connection, $sql_u);
  	$res_e = mysqli_query($connection, $sql_e);

	if (mysqli_num_rows($res_u) > 0) 
	{
		echo "Sorry, username already taken";
		exit;
	}

	if (empty($confirm) or $confirm != $password)
	{
		echo "Passwords do not match";
		exit;
	}
	else
	{
		$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
		$query = "INSERT INTO `users` (username, password) VALUES ('$username','$password')";
		$results = mysqli_query($connection, $query);
		echo 'Registered';
		header ("location: login.php");
		exit();
	}
}


?>
 
 <!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="./reg.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="confirm_password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
