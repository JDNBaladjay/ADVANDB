
<html>
<head>
  <?php
    $year = $_GET['year'];
    $mysqli = new mysqli("localhost", "root", "", "suiciderates");
    $time = microtime(TRUE);
    $result = $mysqli->query("SELECT countries AS Country , SUM(suicides_no) AS 'Suicide_Count' FROM master WHERE year = '".$year."' GROUP BY country ORDER BY country");
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