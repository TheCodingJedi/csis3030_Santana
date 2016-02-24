<?php include("global.php");
	  include("header.php");

	$session_id = session_id();
	
	$sql = "SELECT products.id, products.product_name, products.description, products.image, cart.session_id, cart.quantity 
			FROM products 
			INNER JOIN cart 
			ON products.id = cart.product_id AND cart.session_id = '$session_id'";
	$result = mysqli_query($connection, $sql);
	
	echo '<form action="cart_process.php" method="POST" style="position: relative; background-color: #b0e0e6; height: auto; width: 700px"><br />';	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div style="display: flex; flex: 1">';
		echo '<div style="display: inline-block; margin-right: 10px; margin-bottom: 10px; border: 1px solid black; background-color: white; width: 200px">';
		echo "<center>";
		echo "<b>" . $row["product_name"] . "<b><br />";
		echo '<img style="position: relative; width: 200px; height: 300px" src="images/' . $row["image"] . '">' ."<br />";
		echo "</center>";		
		echo "</div>";
		echo '<div style="margin-right: 10px; margin-bottom: 10px; border: 1px solid black; background-color: white; width: 300px">';
		echo "<center>";
		echo "<b>DESCRIPTION<b><br /><br />" . $row["description"] . "<br /><br /><br /><br /><br />";		
		echo '<b>QUANTITY<b><br /><input type="text" size="3" style="text-align: center" name="' . 'product_' . $row["id"] . '" value="' . $row["quantity"] . '">';
		echo "</center>";
		echo "</div>";
		echo "</div>";
	}
	echo "<br />";
	echo "<center>";
	echo '<input type="submit" name="update_cart" value="Update Cart">';
	echo "&emsp;";
	echo "&emsp;";
	echo '<input type="submit" name="checkout" value="Checkout">';	
	echo "</center>";
	echo "<br />";
	echo '</form>';
	
	include("footer.php");
?>