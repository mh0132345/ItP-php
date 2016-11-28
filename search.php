<DOCTYPE! HTML>
<html>
<head>
	<title> Result </title>
</head>
<body>
<h1> Searching result </h1>
<?php
function search() {
	$dir="blog/";
	$filePrefix="comment";
	$keyword = $_POST["keyword"];
	$files=scandir($dir);
	foreach($files as $f) {
		if(substr($f, 0, strlen($filePrefix)) === $filePrefix){
			// If key word isn't case sensitive, we can use stripos() or strtolower() both string
			$content = file_get_contents($dir . $f);
			if (strpos($content,$keyword)>-1) echo $content;
		}
	}
} 
search();
echo "<hr>"; 
echo "<a href='example_9.html'>Main Page</a>";
?>
</body>
</html>