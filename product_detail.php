<?php include("global.php");
	  include("header.php");

	$sql = "SELECT * FROM products
		WHERE products.id = " . intval($_GET["product_id"]);
	$result = mysqli_query($connection, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		$product_id = "product_" . $row["id"];
		$product_name = $row["product_name"];
		$product_image = $row["image"];
		$product_description = $row["description"];
	}
?>

<form action="cart_process.php" method="POST" style="position: absolute; height: 600px; width: 800px; background-color: #FFCCCC">
	<center>
		<input type="hidden" name="prod_name" value="<?php echo $product_name; ?>" />
		<input type="hidden" name="prod_image" value="<?php echo $product_image; ?>" />
		<input type="hidden" name="prod_desc" value="<?php echo $product_description; ?>" />
		
		<br />
		<br />
		<b type="text" value="<?php echo $product_name; ?>"><?php echo $product_name; ?><b>		
		<br />
		<br />
		<img style="position: relative; width: 200px; height: 300px" src="images/<?php echo $product_image; ?>" value="<?php echo $product_image; ?>" />
		<br />
		<br />
		<b><?php echo $product_description; ?><b>
		<br />
		<br />
		<b>Add Quantity<b>
		<br />
		<input type="text" name="<?php echo $product_id; ?>" size="2" />
		<br />
		<br />
		<input type="submit" value="Add To Cart" />
	</center>
</form>

<?php include("footer.php"); ?>