<?php include("global.php"); ?>
<?php include("header.php"); ?>

<span style="color: red"><?php echo $errormessage; ?></span>
<br />
<br />
<form action="checkout_process.php" method="POST" style="position: absolute; background-color: #e6b6b0; height: auto; width: 300px">
	
	<br />
	<label>First Name:</label>
	&emsp;
	<input type="text" name="first_name" value="<?php echo $txtName; ?>"></input>
	<br />
	<br />
	<label>Address:</label>
	&emsp;
	<input type="text" name="address" value="<?php echo $txtAddress; ?>"></input>
	<br />
	<br />
	<label>City:</label>
	&emsp;
	<input type="text" name="city" value="<?php echo $txtCity; ?>"></input>
	<br />
	<br />
	<label>State:</label>
	&emsp;
	<input type="text" name="state" value="<?php echo $txtState; ?>"></input>
	<br />
	<br />
	<label>Zip Code:</label>
	&emsp;
	<input type="text" name="zipcode" value="<?php echo $txtZip; ?>"></input>
	<br />
	<br />
	<center>
	<input type="submit" value="Order" >
	</center>
	<br />

</form>

<?php include("footer.php"); ?>