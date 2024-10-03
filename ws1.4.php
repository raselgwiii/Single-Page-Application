<!DOCTYPE html>
<html>

<head>
    <title>WS1.4 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header">
        <div class="row">

            <div class="col-6">
                <div class="subject">
                    <h3>Advanced Web Development: Back End</h3>
                </div>
            </div>

            <div class="col-4">
                <div class="profile-container">
                    <div class="name">
                        CAPONGA, RUSSEL GUE
                    </div>
                    <div class="image">
                        <img src="img/pic.jpg" alt="Profile Image">
                    </div>

                </div>
            </div>

        </div>

        </div>
    </header>

    <div class="box">
        <nav>
            <ul>
                <li><a href="index.html">WORKSHEET 1.1</a></li>
                <li><a href="ws1.3.php">WORKSHEET 1.3</a></li>
                <li><a href="ws1.4.php">WORKSHEET 1.4</a></li>
                <li><a href="ws1.5.php">WORKSHEET 1.5</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="tab-content">
            <!-- Tab 2 Content -->
            <div id="tab2" class="tab-pane fade show active">

                <?php
                // Include the database connection
                include 'connect.php';

                // Query for top 10 customers
                $customersQuery = "SELECT CustomerName, SUM(Quantity) AS total_quantity
                                       FROM orders
                                       INNER JOIN order_details ON orders.OrderID = order_details.OrderID
                                       INNER JOIN customers ON orders.CustomerID = customers.CustomerID
                                       GROUP BY CustomerName
                                       ORDER BY total_quantity DESC
                                       LIMIT 10";
                $customersResult = mysqli_query($conn, $customersQuery);

                // Query for top 10 products
                $productsQuery = "SELECT ProductName, COUNT(order_details.ProductID) AS total_orders
                                      FROM  order_details
                                      INNER JOIN products ON  order_details.ProductID = products.ProductID
                                      GROUP BY ProductName
                                      ORDER BY total_orders DESC
                                      LIMIT 10";
                $productsResult = mysqli_query($conn, $productsQuery);

                // Query for percentage of orders per year
                $yearPercentageQuery = "SELECT YEAR(OrderDate) AS OrderYear, COUNT(OrderID) AS total_orders,
                                            COUNT(OrderID) * 100.0 / (SELECT COUNT(OrderID) FROM orders) AS percentage
                                            FROM orders
                                            GROUP BY OrderYear
                                            ORDER BY OrderYear";
                $yearPercentageResult = mysqli_query($conn, $yearPercentageQuery);

                // Fetching results into arrays
                $customerNames = $customerQuantities = $productNames = $productOrders = $orderYears = $orderPercentages = [];

                while ($row = mysqli_fetch_assoc($customersResult)) {
                    $customerNames[] = $row['CustomerName'];
                    $customerQuantities[] = $row['total_quantity'];
                }

                while ($row = mysqli_fetch_assoc($productsResult)) {
                    $productNames[] = $row['ProductName'];
                    $productOrders[] = $row['total_orders'];
                }

                while ($row = mysqli_fetch_assoc($yearPercentageResult)) {
                    $orderYears[] = $row['OrderYear'];
                    $orderPercentages[] = $row['percentage'];
                }
                ?>

                <!-- Top 10 Customers with Highest Ordered Products -->
                <h4>1. Top 10 Customers with Highest Ordered Products</h4>
                <canvas id="top-customers-chart"></canvas>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Total Products Ordered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customerNames as $index => $name) { ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $customerQuantities[$index]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>

                <!-- Top 10 Products with Most Orders -->
                <h4>2. Top 10 Products with Most Orders</h4>
                <canvas id="top-products-chart"></canvas>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Total Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productNames as $index => $productName) { ?>
                            <tr>
                                <td><?php echo $productName; ?></td>
                                <td><?php echo $productOrders[$index]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>

                <!-- Percentage of Orders Per Year -->
                <h4>3. Percentage of Orders Per Year</h4>
                <canvas id="orders-percentage-chart"></canvas>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Total Orders</th>
                            <th>Percentage (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderYears as $index => $year) { ?>
                            <tr>
                                <td><?php echo $year; ?></td>
                                <td><?php echo $orderPercentages[$index]; ?></td>
                                <td><?php echo number_format($orderPercentages[$index], 2); ?>%</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Top 10 Customers Chart
        var ctxCustomers = document.getElementById("top-customers-chart").getContext('2d');
        new Chart(ctxCustomers, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($customerNames); ?>,
                datasets: [{
                    label: 'Total Products Ordered',
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                        '#FF9F40', '#E7E9ED', '#71B37C', '#FDB45C', '#949FB1'
                    ],
                    data: <?php echo json_encode($customerQuantities); ?>
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Top 10 Customers with Highest Ordered Products'
                }
            }
        });

        // Top 10 Products Chart
        var ctxProducts = document.getElementById("top-products-chart").getContext('2d');
        new Chart(ctxProducts, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($productNames); ?>,
                datasets: [{
                    label: 'Number of Orders',
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                        '#FF9F40', '#E7E9ED', '#71B37C', '#FDB45C', '#949FB1'
                    ],
                    data: <?php echo json_encode($productOrders); ?>
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Top 10 Products with Most Orders'
                }
            }
        });

        // Percentage of Orders Per Year
        var ctxOrders = document.getElementById("orders-percentage-chart").getContext('2d');
        new Chart(ctxOrders, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($orderYears); ?>,
                datasets: [{
                    label: 'Percentage of Orders',
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                    data: <?php echo json_encode($orderPercentages); ?>
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Percentage of Orders Per Year'
                }
            }
        });
    </script>
    <footer>
        <h2>Jim-mar Delos Reyes</h2>
        <p>Instructor</p>
    </footer>
</body>

</html>