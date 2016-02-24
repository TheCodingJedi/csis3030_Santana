<?php include("global.php");
	  include("header.php");
	
	$sql = "SELECT * FROM products
			WHERE products.category_id = " . intval($_GET["category_id"]);
	$result = mysqli_query($connection, $sql);
	
	echo '<center><b style="font-size: 30px">' . mysqli_real_escape_string($connection, $_GET["category_name"]) . '</b></center>';
	echo "<br /><br /><br />";
	echo '<div style="background-color: #C0C0C0"><br/>';
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div style="display: flex; flex: 1">';
		echo '<div style="display: inline-block; margin-right: 10px; margin-bottom: 10px; border: 1px solid black; background-color: white; width: 220px">';
		echo "<center>";		
		echo "<b>" . $row["product_name"] . "<b><br />";
		echo '<img style="position: relative; width: 200px; height: 300px" src="images/' . $row["image"] . '">' . "<br />";		
		echo "</center>";
		echo "</div>";		
		echo '<div style="margin-right: 10px; margin-bottom: 10px; border: 1px solid black; background-color: white; width: 300px;">';
		echo "<center>";		
		echo "<b>PRICE<b><br/>" . $row["price"] . "<br/><br/>";
		echo "<b>QUANTITY<b><br/>" . $row["quantity_remaining"] . "<br/><br/>";
		echo "<b>DESCRIPTION<b><br/><br/>" . $row["description"] . "<br/><br /><br />";		
		echo '<a href="product_detail.php?product_id=' . $row["id"] . '">SELECT PRODUCT</a>';
		echo "</center>";
		echo "</div>";
		echo "</div>";
	}
	
	echo "</div>";
	
	include("footer.php");
?>


 
 