<html>
<head>
  <?php
    $country1 = $_GET['country1'];
    $country2 = $_GET['country2'];
    $mysqli = new mysqli("localhost", "root", "", "suiciderates");
    $time = microtime(TRUE);
    $result = $mysqli->query("SELECT country AS Country, SUM(suicides_no) AS Suicide_Count FROM master  WHERE country = '".$country1."' OR country = '".$country2."' GROUP BY country ORDER BY SUM(suicides_no) DESC");
  ?>
  <link rel="stylesheet" type="text/css" href="../css/query.css">
</head>
<body>
  <div id="result">
    <table>
      <tr>
        <th>Country</th>
        <th>Suicide Count</th>
      </tr>
      <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "
                <tr>
                  <td>". $row["Country"]. "</td>
                  <td>". $row["Suicide_Count"]. "</td>
                </tr>";
          }
          $time = microtime(TRUE) - $time;
        } else {
          echo "<tr>
                  <td>0 results</td>
                  <td></td>
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