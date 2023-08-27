<?php
// Database configuration
$host = 'localhost';     // Database host (e.g., 'localhost' or '127.0.0.1')
$user = 'root'; // Database username
$pass = ''; // Database password
$db_name = 'hallmanagement'; // Database name

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Other configuration options

define('BASE_URL', 'http://localhost/hallsoftware'); // Base URL of the website

?>
