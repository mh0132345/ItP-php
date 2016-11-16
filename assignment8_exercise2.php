<!DOCTYPE html>
<html>
<body>

<form action ="assignment8_exercise2.php" method='POST'>
  Course: 
  <select name='course'>
	<option name='Introduction to Programming'>Introduction to Programming</option>
	<option name="Finnish Language">Finnish Language</option>
	<option name="Basics of Electronics">Basics of Electronics</option>
	<option name="Communication Skills">Communication Skills</option>
  </select> <br/>
  Student name: <input type="text"  name="name"><br/>
  Feedback 
  <select name='feedback' >
  <option name='1'>1</option>
  <option name="2">2</option>
  <option name="3">3</option>
  <option name="4">4</option>
  </select> <br/>
  <textarea name='comment' rows="4" cols="50">
  </textarea> <br/>
  <input type="submit" value="Submit">
</form>
<?php
function display() {
	$name = $_POST["name"];
	$course = $_POST['course'];
	$feedback = $_POST['feedback'];
	$comment = $_POST['comment'];
	echo "<table border='1'>";
	echo "<tr><td>";
	echo "Name of student: ".$name."<br/>";	
	echo "Course: ".$course."<br/></td>";
	switch($feedback) {
		case 1:
			echo '<td style="background: red;"> Course evalution: poor<br/>';
			echo 'Comment: '.$comment.'</td>';
			break;
		case 2:
			echo '<td style="background: purple;"> Course evalution: fair<br/>';
			echo 'Comment: '.$comment.'</td>';
			break;
		case 3:
			echo '<td style="background: green;"> Course evalution: good<br/>';
			echo 'Comment: '.$comment.'</td>';
			break;
		case 4:
			echo '<td style="background: orange;"> Course evalution: excellent<br/>';
			echo 'Comment: '.$comment.'</td>';
			break;
	}
	echo "</table>";
}
echo "<hr>";
display();
?>
</body>
</html>