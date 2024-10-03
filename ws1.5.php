<!DOCTYPE html>
<html lang="en">

<head>
    <title>WS1.3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <div class="num-container">
            <button id="n1" type="button" class="btn btn-success">Number1</button>
            <button id="n2" type="button" class="btn btn-success">Number2</button>
            <button id="n3" type="button" class="btn btn-success">Number3</button>
            <button id="n4" type="button" class="btn btn-success">Number4</button>
            <button id="n5" type="button" class="btn btn-success">Number5</button>
        </div>

        <div class="export">
            <!-- Export to Excel button -->
            <button id="exportToExcel" type="button" class="btn btn-success">Export to Excel</button>
        </div>
        <section id="load-here"></section>
    </div>

    <script type="text/javascript">
        var but1 = document.getElementById('n1');
        var but2 = document.getElementById('n2');
        var but3 = document.getElementById('n3');
        var but4 = document.getElementById('n4');
        var but5 = document.getElementById('n5');
        var butnums = document.getElementById('nums');

        function defaultnumber() {
            var contentTitle = "";
            FileNametoExport = "number1.php"

            fetch('number1.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        defaultnumber()
        // Event listener for Products button
        but1.addEventListener('click', function() {
            var contentTitle = "";
            fetch('number1.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        // Event listener for Products button
        but2.addEventListener('click', function() {
            var contentTitle = "";
            fetch('number2.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        // Event listener for Products button
        but3.addEventListener('click', function() {
            var contentTitle = "";
            fetch('number3.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        // Event listener for Products button
        but4.addEventListener('click', function() {
            var contentTitle = "";
            fetch('number4.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        // Event listener for Products button
        but5.addEventListener('click', function() {
            var contentTitle = "";
            fetch('number5.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'contentTitle=' + encodeURIComponent(contentTitle),
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('load-here').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });


        // Export to Excel functionality
        document.getElementById('exportToExcel').addEventListener('click', function() {
            window.open('number1.php'); // Redirect to export script
        });
    </script>

    <footer>
        <h2>Jim-mar Delos Reyes</h2>
        <p>Instructor</p>
    </footer>
</body>

</html>