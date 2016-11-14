<!DOCTYPE html>
<html>
<body>

<form action ="assignment8_exercise1.php"
  oninput="result.value= 'Name: ' + name.value + ' Price: ' + price.value + '  Amount: ' + amount.value + ' Total value: ' + (parseInt(price.value)*parseInt(amount.value))">
  Name: <input type="text"  name="name"><br/>
  Unit price: <input type="number"  name="price" value="0"><br/>
  Amount: <input type="number"  name="amount" value="0"><br/>
  <output name="result"></output><br/>
  <input type="submit" value="Submit">
</form>
<?php

function display($price, $amount) {
	
	if(empty($price) || empty($amount))
		echo "Can't caculate! <br/>";
	else {
		echo "Name of product: ".$_GET["name"]."<br/>";	
		echo "The unit price: ".$price."<br/>";
		echo "The amount of it: ".$amount."<br/>";
		$total = $price * $amount;
		echo "The total value: ".$total."<br/>";
	}
}
echo "<hr>";
display($_GET["price"], $_GET["amount"] );
?>
</body>
</html>