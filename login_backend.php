        <?php
        //error loging
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        // Database credentials

          // Check if the form is submitted
          if ($_SERVER["REQUEST_METHOD"] === "POST") {
              // Get the submitted username and password
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

              // TODO: Add your database connection code here
              require_once('config.php');



            // Connect to the MySQL database
              $conn = new mysqli("$DB_HOST", "$DB_USER", "$DB_PASS", "$DB_NAME");
            
              

              // Check the connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              // Prepare the SQL statement to retrieve user data based on the provided username
              $sql = "SELECT * FROM users WHERE username = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s", $username);
              $stmt->execute();

              // Get the result
              $result = $stmt->get_result();

              // Check if a user with the provided username exists
              if ($result->num_rows === 1) {
                  $row = $result->fetch_assoc();

                  // Verify the password
                  if (password_verify($password, $row["password"])) {
                      // Password is correct, set authenticated session or token
                      session_start();
                      $_SESSION["username"] = $username;

                      // Redirect to the next page upon successful login
                      //echo "Cool";
                      header("Location: test.php");
                      exit;
                  } else {
                      // Invalid password
                      echo "Invalid username or password.";
                  }
              } else {
                  // Invalid username
                  echo "Invalid username or password.";
              }

              // Close the database connection
              $stmt->close();
              $conn->close();
          }
          ?>