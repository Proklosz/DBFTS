<?php
//error loging
error_reporting(E_ALL);
ini_set('display_errors', '1');


// Retrieve form data using the $_POST superglobal
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';



// Validate the presence of required fields
if (empty($username) || empty($email) || empty($password) || empty($password2)) {
    echo "Please fill in all the required fields.";
    exit;
}

//Check if passwords match
if ($password != $password2) {
    echo "Passwords doesnt match!";
    exit;
}

// Sanitize user inputs
$username = htmlspecialchars($username);
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);
$password2 = htmlspecialchars($password2);


// Hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require_once('config.php');



// Connect to the MySQL database
$mysqli = new mysqli("$DB_HOST", "$DB_USER", "$DB_PASS", "$DB_NAME");

// Check for any connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


//Check if the username is in use for someone else
$sql2 = "SELECT * FROM users WHERE username = ?";
$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("s", $username);
$stmt->execute();

    // Get the result
$result = $stmt->get_result();

    // Check if a user with the provided username exists
if ($result->num_rows === 1) {
    echo "Username already in use!";
}else{
    // Construct the SQL INSERT statement
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    // Execute the INSERT statement
    if ($mysqli->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login_page.php");
    } else {
        echo "Error: " . $mysqli->error;
    }
}


// Close the database connection
$mysqli->close();
?>
