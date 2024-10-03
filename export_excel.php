<?php
include 'connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for export (customize your table name and columns)
$query = "SELECT * FROM customers"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($query);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="worksheet_data.xls"');

if ($result->num_rows > 0) {
    // Output column headers
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo $field->name . "\t";
    }
    echo "\n";

    // Output rows
    while ($row = $result->fetch_assoc()) {
        echo implode("\t", $row) . "\n";
    }
} else {
    echo "No data found";
}

$conn->close();
