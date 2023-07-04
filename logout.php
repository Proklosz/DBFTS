
<?php
session_start();

// Clear authentication-related session variables
unset($_SESSION["username"]);

// Destroy the session
session_destroy();

// Redirect to the login page or any other page
header("Location: index.php");
exit;
?>