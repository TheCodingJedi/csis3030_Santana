<?php
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<a href="product_list.php?category_id=' . $row["id"] . '&category_name=' . $row["category_name"] . '">' . $row["category_name"] . '</a>';
		echo "<br /><br />";		
	}
?>