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
  </script>


  </script>
  <script type="text/javascript">
    function searchin() {
      var searchInput = document.getElementById('myInput');
      var table = document.getElementById('myTable');
      var rows = table.getElementsByTagName('tr');

      searchInput.addEventListener('input', function() {
        var filter = searchInput.value.toLowerCase();

        for (var i = 1; i < rows.length; i++) {
          var row = rows[i];
          var cells = row.getElementsByTagName('td');
          var shouldHide = true;

          for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
              shouldHide = false;
              break;
            }
          }

          row.style.display = shouldHide ? 'none' : '';
        }
      });

    }
  </script>
  <script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable");
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase this count by 1:
          switchcount++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>
  <footer>
    <h2>Jim-mar Delos Reyes</h2>
    <p>Instructor</p>
  </footer>
</body>

</html>