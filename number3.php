<html>
<h2>
	<?php

	$contentTitle = isset($_POST['contentTitle']) ? $_POST['contentTitle'] : '';
	echo $contentTitle;

	?>
</h2>
<input type="text" id="myInput" onkeyup="searchin()" placeholder="Search..." title="Type in something">
<table id="myTable" class="table">
	<thead>
		<h4><br>List of all customers that have ordered "Tofu" product.</h4>
		<tr>
			<th onclick="sortTable(0)">Customer ID</th>
			<th onclick="sortTable(0)">Customer Name</th>
			<th onclick="sortTable(1)">Product Order</th>
		</tr>
	</thead>

	<tbody>
		<?php
		include 'connect.php';
		$sql = "SELECT customers.CustomerID, customers.CustomerName, products.ProductName
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN order_details ON orders.OrderID = order_details.OrderID
JOIN products ON order_details.ProductID = products.ProductID
WHERE products.ProductName = 'Tofu'";
		$all_sql = $conn->query($sql);
		while ($row = mysqli_fetch_array($all_sql)) {
		?>
			<tr>
				<td><?php echo $row["CustomerID"]; ?></td>
				<td><?php echo $row["CustomerName"]; ?></td>
				<td><?php echo $row["ProductName"]; ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
</body>

</html>