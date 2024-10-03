<html>

<body>
	<style>
		/* Table Styles */
		table {
			width: 100%;
			/* Full width table */
			border-collapse: collapse;
			/* Collapsed borders */
			margin-top: 20px;
			/* Space above table */
			color: #1b1b1b;
			/* Dark text for table */
		}

		th {
			background-color: #ffccff;
			/* Light lavender for table headers */
			color: #1b1b1b;
			/* Dark text for headers */
			padding: 10px;
			/* Add padding */
			text-align: left;
			/* Left align text */
		}

		td {
			padding: 10px;
			/* Add padding to table cells */
		}

		tbody tr:nth-child(odd) {
			background-color: #f2e6f2;
			/* Slightly lighter lavender for odd rows */
		}

		tbody tr:nth-child(even) {
			background-color: #e6ccff;
			/* Slightly darker lavender for even rows */
		}

		.table-bordered {
			border: 1px solid #9e0a3d;
			/* Burgundy border around the table */
		}
	</style>
	<h2>
		<?php
		$filename = "sampletable";
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=" . $filename . ".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		include "connect.php";
		?>
	</h2>
	<input type="text" id="myInput" " placeholder=" Search..." title="Type in something">
	<table id="myTable" class="table">
		<thead>
			<h4><br>Retrieve the customer names and contact information of all customers who have placed an order.</h4>
			<tr>
				<th>Customer ID</th>
				<th>Customer Name</th>
				<th>Contact Name</th>
			</tr>
		</thead>

		<tbody>

			<?php


			// Query to select distinct customers who have placed orders
			$sql = "SELECT  customers.CustomerID, customers.CustomerName, customers.ContactName 
        FROM customers 
        JOIN orders ON customers.CustomerID = orders.CustomerID";

			// Execute the query
			$all_sql = $conn->query($sql);

			if ($all_sql->num_rows > 0) {
				// Loop through the result set
				while ($row = $all_sql->fetch_assoc()) {
			?>
					<tr>
						<td><?php echo $row["CustomerID"]; ?></td>
						<td><?php echo $row["CustomerName"]; ?></td>
						<td><?php echo $row["ContactName"]; ?></td>
					</tr>
			<?php
				}
			} else {
				echo "<tr><td colspan='3'>No customers found.</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>

</html>