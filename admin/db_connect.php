<?php
// db_connect.php
$host = 'localhost'; // Your database host (usually 'localhost')
$db = 'beszorg';     // Your database name
$user = 'root';      // Your MySQL username
$pass = '';          // Your MySQL password (default is empty for XAMPP/WAMP)

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>