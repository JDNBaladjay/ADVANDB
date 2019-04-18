<html>
<head>
    <?php
        $year = $_GET['year'];
        $mysqli = new mysqli("localhost", "root", "", "suiciderates");
        $time = microtime(TRUE);
        $result = $mysqli->query("SELECT country AS Country , hdiyear AS HDI FROM master WHERE year=".$year." ORDER BY country");
    ?>
    <link rel="stylesheet" type="text/css" href="../css/query.css">
</head>
<body>
  <div id="result">
    <table>
      <tr>
        <th>Country</th>
        <th>HDI</th>
      </tr>
      <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "
                <tr>
                  <td>". $row["Country"]. "</td>
                  <td>". $row["HDI"]. "</td>
                </tr>";
          }
          $time = microtime(TRUE) - $time;
        } else {
          echo "<tr>
                  <td>0 results</td>
                  <td></td>
                </tr>";
        }
      ?>
    </table>

    <?php
      echo "The query took ". $time . " to process."
    ?>
  </div>
</body>
</html>
