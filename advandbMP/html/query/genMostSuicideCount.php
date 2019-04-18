<html>
<head>
  <?php
    $mysqli = new mysqli("localhost", "root", "", "suiciderates");
    $time = microtime(TRUE);
    $result = $mysqli->query("SELECT generation, SUM(suicides_no) AS Suicide_Count FROM master GROUP BY generation ORDER BY SUM(suicides_no) DESC");
  ?>
  <link rel="stylesheet" type="text/css" href="../css/query.css">
</head>
<div id="result">
    <table>
      <tr>
        <th>Generation</th>
        <th>Suicide Count</th>
      </tr>
      <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "
                <tr>
                  <td>". $row["generation"]. "</td>
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