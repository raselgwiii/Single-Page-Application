<html>

<body>
	<h2>
		<?php

		$contentTitle = isset($_POST['contentTitle']) ? $_POST['contentTitle'] : '';
		echo $contentTitle;

		?>
	</h2>
	<input type="text" id="myInput" onkeyup="searchin()" placeholder="Search..." title="Type in something">
	<table id="myTable" class="table">
		<thead>
			<h4><br>List of all customers and its ordered products with its price and quantity from the country Sweden.</h4>
			<tr>
				<th onclick="sortTable(0)">Customer Name</th>
				<th onclick="sortTable(1)">Product Name</th>
				<th onclick="sortTable(2)">Quantity</th>
				<th onclick="sortTable(2)">Price</th>
				<th onclick="sortTable(0)">Country</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include 'connect.php';
			$sql = "SELECT customers.CustomerName,customers.Country, products.ProductName, order_details.Quantity, products.Price
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN order_details ON orders.OrderID = order_details.OrderID
JOIN products ON order_details.ProductID = products.ProductID
WHERE customers.Country = 'Sweden'";
			$all_sql = $conn->query($sql);
			while ($row = mysqli_fetch_array($all_sql)) {
			?>
				<tr>
					<td><?php echo $row["CustomerName"]; ?></td>
					<td><?php echo $row["ProductName"]; ?></td>
					<td><?php echo $row["Quantity"]; ?></td>
					<td><?php echo $row["Price"]; ?></td>
					<td><?php echo $row["Country"]; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>

</html>