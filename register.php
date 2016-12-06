<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>

<?php
if(!empty($_POST['fname'])&& !empty($_POST['lname'])&& !empty($_POST['phone']) && !empty($_POST['username']) && !empty($_POST['psw']) ) {
	$dir="blog/users/";
	$filePrefix=$_POST['username'];
	if (!file_exists($dir)) {
		mkdir($dir);
		chmod($dir, 0711);
	}
	if (file_exists($dir.$filePrefix)) {
		echo 'Existed username! Please choose again';
	} else {
		$userFile = fopen($dir.$filePrefix, "w+");
		foreach ($_POST as $data){
			fwrite($userFile, $data."\r\n");
		}
		echo "Register success! You can back to login page";
	}
	fclose($userFile);
} else {
?>
<h2> Please input all required data </h2>
<form action="register.php" method="post">
<table>
<tr><th>First name:</th><td <?php if(empty($_POST["fname"]) || strlen(trim($_POST["fname"]))==0) echo " style=background-color:red;"; ?>><input type='text' name='fname' value="<?php if(!empty($_POST["fname"])) echo $_POST["fname"]; ?>" /> </td></tr>
<tr><th>Last name:</th><td <?php if(empty($_POST["lname"]) || strlen(trim($_POST["lname"]))==0) echo " style=background-color:red;"; ?>><input type='text' name='lname' value="<?php if(!empty($_POST["lname"])) echo $_POST["lname"]; ?>" /> </td></tr>
<tr><th>Phone number:</th><td <?php if(empty($_POST["phone"]) || strlen(trim($_POST["phone"]))==0) echo " style=background-color:red;"; ?>><input type='text' name='phone' value="<?php if(!empty($_POST["phone"])) echo $_POST["phone"]; ?>" /> </td></tr>
<tr><th>Username:</th><td <?php if(empty($_POST["username"]) || strlen(trim($_POST["username"]))==0) echo " style=background-color:red;"; ?>><input type='text' name='username' value="<?php if(!empty($_POST["username"])) echo $_POST["username"]; ?>" /> </td></tr>
<tr><th>Password: </th><td <?php if(empty($_POST["psw"]) || strlen(trim($_POST["psw"]))==0) echo "style=background-color:red;"; ?>><input type="password" name="psw" value="<?php if(!empty($_POST["psw"])) echo $_POST["psw"]; ?>"/></td></tr>
<tr><td></td><td><input type="submit" value="Login" /></td></tr>
</table>
</form>
<?php } ?>
<br/>
<h4> Already have an account? Login <a href='login.php'>here</a> <h4>
</body>
</html>