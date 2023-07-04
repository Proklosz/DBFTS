<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();

    // Check if user is authenticated
    if (!isset($_SESSION["username"])) {
        // Redirect to the login page
        header("Location: index.php");
        exit;
    }
    require_once('config.php');

    $conn = new mysqli("$DB_HOST", "$DB_USER", "$DB_PASS", "$DB_NAME");
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        //echo "szopik valami";
    }
    $pdo = new PDO('mysql:host=localhost;dbname=futas', 'user', '12345678');

    // Retrieve the scoreboard data from the database ordered by the "score" column in descending order
    $stmt = $pdo->query('SELECT * FROM passings ORDER BY time DESC');
    $scoreboardData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the scoreboard data
    echo '<table id="table">';
    echo '<tr><th>Chip</th><th>Time</th></tr>';

    foreach ($scoreboardData as $row) {
        echo '<tr>';
        echo '<td>' . $row['chip'] . '</td>';
        echo '<td>' . $row['time'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div id="buttoncontainer">
  <input type="button" onClick="myFunctionL()" value="Kijelentkezés" class="buttonlogout" />
  </div>
  



  <script>
    function myFunctionL() {
        window.location.href = "logout.php";
    }             
  </script>
  
</body>
</html>