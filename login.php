<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<?php
if( !empty($_POST['username']) && !empty( $_POST['psw']) ) {
	$data = [];
	$dir="blog/users/";
	$filePrefix=$_POST['username'];
	if (!file_exists($dir.$filePrefix)) {
		echo 'Wrong username';
	} 
	else {
		$userData = new SplFileObject($dir.$filePrefix);
		while (!$userData->eof()) {
			$data[]=trim($userData->fgets());
		}
		if ($data[4] == $_POST['psw']) {
			require "example_9.html";
		}
		else {
			echo 'Wrong password.Please login again <br/>';
			echo "<a href='login.php'>Login</a>";
		}
	}
} else {
?>
<h2> You need to login to comment </h2>
<form action="login.php" method="post">
<table>
<tr><th>Username:</th><td <?php if(empty($_POST["username"]) || strlen(trim($_POST["username"]))==0) echo " style=background-color:red;"; ?>><input type='text' name='username' value="<?php if(!empty($_POST["username"])) echo $_POST["username"]; ?>" /> </td></tr>
<tr><th>Password: </th><td <?php if(empty($_POST["psw"]) || strlen(trim($_POST["psw"]))==0) echo "style=background-color:red;"; ?>><input type="password" name="psw" value="<?php if(!empty($_POST["psw"])) echo $_POST["psw"]; ?>"/></td></tr>
<tr><td></td><td><input type="submit" value="Login" /></td></tr>
</table>
</form>
Don't have an account? Register <a href='register.php'>here</a>
<?php } ?>
</body>
</html>