<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// database 
$servername = "localhost";
$username = "web";
$password = "pass";
$dbname = "dbusers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$query = "";

// Process form data 
if ($_SERVER["REQUEST_METHOD"] == "GET") {

  // Validate input
  if (isset($_GET["query"])) {
    $query = trim($_GET["query"]);
  }

  // Prepare and execute query
  if (!empty($query)) {
    $sql = "SELECT * FROM users WHERE firstname LIKE '%" . $query . "%'";
    $result = $conn->query($sql);

    // Check for errors
    if ($result === false) {
      die("Error executing query: " . $conn->error);
    }

    // Display results
    if ($result->num_rows > 0) {
      echo "<table>";
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $key => $value) {
          echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
        break; // Display headers only once
      }
      mysqli_data_seek($result, 0); // Reset pointer to beginning
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
          echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "No results found.";
    }
  } else {
    echo "Please enter a search query.";
  }

  // Close connection
  $conn->close();
}
?>

<!-- Create form -->
<form method="GET">
  <label for="query">Query:</label>
  <input type="text" id="query" name="query">
  <button type="submit">Submit</button>
</form>
