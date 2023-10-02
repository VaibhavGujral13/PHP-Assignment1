<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Student Information</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM students ORDER BY name";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="styled-table">';
        echo '<thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Class</th></tr></thead>';
        echo '<tbody>';

        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['class']}</td>
                </tr>";
        }
        echo '</tbody></table>';
      } else {
        echo "0 results";
      }

      $conn->close();
      ?>
</body>
</html>


