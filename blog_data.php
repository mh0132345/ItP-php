<!DOCTYPE html>
<html> <head>
<title>User Blog</title>
</head>
<body>
<?php
//Here we define handle_post() function to handle user post.
function handle_post() {
//Here we define a directory to save data to
$dir="blog/";
$filePrefix="comment";
//Here we check whether public directory exists or not.
//If it does not exist, we will create it.
if (!file_exists($dir)) {
  mkdir($dir);
  chmod($dir, 0711);
}
//Here we get current date and time in seconds and microseconds
//so that first comes microsendons as a decimal number and current data and time
//as an integer 
$time=microtime();
//echo "Time with microtime(): " . $time . "<br/>";
//Here we read the value of microtime to an array 
$timeArray = explode(" ", $time);
//Here we chnge the order of mircoseconds and seconds and combine them as a number 
$timeStamp = (float) $timeArray[1] + (float) $timeArray[0];
if(isset($_POST['submit_comment_data'])) {
//Here we set the permission for the file so that it is readable by all users.
//chmod($dir . "/" . $_FILES['upload_file']['name'], 624);
//Here we read data through $_REQUEST autoglobal, but for security reasons
//not recommended! We should have used $_POST autoglobal to read data from
//the user.
$newEntry = date("H:i:s d/m/Y")." ".$_REQUEST["name"] . " " . $_REQUEST["comment"] . "<br/>";
//Here we create variable $file
$file=$dir . $filePrefix . $timeStamp; 
if(file_put_contents($file, $newEntry) >0)
   echo "Data was successfully written to " . htmlentities($file) . "<br/>";
else
  echo "Data could not be written to " . htmlentities($file) . "<br/>";
}
echo "<hr>";
//Here we read the content of the directory
$files=scandir($dir);
//Here we go through the content of the directory one by one
foreach($files as $f) {
//Here we select files, whose names starts with given prefix, like "comment".
if(substr($f, 0, strlen($filePrefix)) == $filePrefix)
//Here we read and display the content of the comment file. Pay attention
//that we have to give the path and name of the file. 
echo file_get_contents($dir . $f);
}
} //End of function definition.
//Here we call handle_post() function to handle the user post. 
handle_post();
echo "<hr>"; 
//Here we provide a link to the main page.
echo "<a href='example_9.html'>Main Page</a>";
?>
</body>
</html>