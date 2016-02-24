<?php include("global.php");

	$session_id = session_id();
	
	foreach ($_POST as $product_field => $quantity) {
		$pattern = "/product\_([0-9]+)/";
		
		if (preg_match_all($pattern, $product_field, $matches)) {
			$product_id = $matches[1][0];
			
			$sql = "SELECT * FROM cart WHERE session_id = '$session_id' AND product_id = $product_id";
			$result = mysqli_query($connection, $sql);
			
			if (mysqli_num_rows($result) != 0 && !($_POST["checkout"] || $_POST["update_cart"])) {
				$row = mysqli_fetch_assoc($result);
				$quantity = $quantity + $row["quantity"];			
			}
			
			//Delete old cart entry
			$sql = "DELETE FROM cart WHERE session_id = '$session_id' AND product_id = $product_id";
			$result = mysqli_query($connection, $sql);
			
			//Add new cart entry
			$sql = "INSERT INTO cart (session_id, product_id, quantity) VALUES ('$session_id', $product_id, $quantity)";
			$result = mysqli_query($connection, $sql);
		}
	}
	
	if ($_POST["checkout"]) {
		header("Location: checkout_form.php");
	} else {
		header("Location: cart_list.php");
	}
?>