<?php include("global.php");
	  include("jwu_mail.php");

	$txtName = mysqli_real_escape_string($connection, $_POST["first_name"]);
	$txtAddress = mysqli_real_escape_string($connection, $_POST["address"]);
	$txtCity = mysqli_real_escape_string($connection, $_POST["city"]);
	$txtState = mysqli_real_escape_string($connection, $_POST["state"]);
	$txtZip = mysqli_real_escape_string($connection, $_POST["zipcode"]);
	
	//First Name RegExp
	$expName = '/^[A-Z][a-z]+$/';
	//Address RegExp
	$expAddress = '/^(\d{1,4})( [A-Z][a-z]+){1,2} (St|Street|Ave|Avenue){1,1}$/';
	//City RegExp
	$expCity = '/^[A-Z][a-z]+( [A-Z][a-z]+)?$/';
	//State RegExp
	$expState = '/^[A-Z]{2,2}$/';
	//Zip Code RegExp
	$expZip = '/^\d{5,5}(-\d{4,4})?$/';
	
	//First Name
	if (empty($txtName) || ! preg_match($expName, $txtName, $match)) {
		$errormessage .= "The name field cannot be blank and must contain letters only!" . "<br />";
	}
	//Address
	if (empty($txtAddress) || ! preg_match($expAddress, $txtAddress, $match)) {
		$errormessage .= "The address field cannot be blank and must contain a valid address!" . "<br />";	
	}
	//City
	if (empty($txtCity) || ! preg_match($expCity, $txtCity, $match)) {
		$errormessage .= "The city field cannot be blank and must contain letters only!" . "<br />";
	}
	//State
	if (empty($txtState) || ! preg_match($expState, $txtState, $match)) {
		$errormessage .= "The state field cannot be blank and must contain two capitalized letters!" . "<br />";
	}
	//Zip Code
	if (empty($txtZip) || ! preg_match($expZip, $txtZip, $match)) {
		$errormessage .= "The zip code field cannot be blank and must contain a valid zip code!" . "<br />";
	}
	
	if (!empty($errormessage)) {
		include("checkout_form.php");
		die();
	} else {
		
		$session_id = session_id();
		
		//Getting the information found in products and cart
		$sql = "SELECT products.id, products.product_name, products.price, products.quantity_remaining, cart.quantity FROM products 
				INNER JOIN cart 
				ON products.id = cart.product_id AND cart.session_id = '$session_id'";
		$result = mysqli_query($connection, $sql);
		
		$Summary = "<b>Billing Address<b>";
		$Summary .= "<br />" . "<br />" . "<br />";
		$Summary .= "Name: " . $txtName . "<br />";
		$Summary .= "Address: " . $txtAddress . "<br />";
		$Summary .= "City: " . $txtCity . "<br />";
		$Summary .= "State: " . $txtState . "<br />";
		$Summary .= "Zip Code: : " . $txtZip . "<br />";
		$Summary .= "<br />" . "<br />" . "<br />";
		$Summary .= "<b>Order Summary<b>";
		$Summary .= "<br />" . "<br />" . "<br />";
		
		while ($row = mysqli_fetch_assoc($result)) {
			$Summary .= "<b><u>" . $row["product_name"] . "</u></b><br />";
			$Total = $row["price"] * $row["quantity"];
			$Summary .= "Price: $" . $row["price"] . " x " . $row["quantity"] . " = $" . $Total . "<br /><br />";
			$Total_Cost += $Total;
			
			//Updating the remaining quantity while there are still results
			$sql_update = "UPDATE products 
						  INNER JOIN cart 
						  ON products.id = " . $row["id"] . " AND cart.session_id = '$session_id' 
						  SET quantity_remaining = " . $row["quantity_remaining"] . " - " . $row["quantity"];
			mysqli_query($connection, $sql_update);
		}
		
		$Summary .= "<br /><br />Total Cost: $" . $Total_Cost;
		echo $Summary;		
		
		//Email
		$message = str_replace("<br />", "\n", $Summary);
		jwu_mail("AAS008@jwu.edu", "Results", $message);		
	}
?>