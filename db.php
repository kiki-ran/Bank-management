<?php
$servername = "localhost";
$username = "root";
$password = "";  // Use your MySQL root password if one is set
$dbname = "bank_db";
$port = 3307;  // Specify the MySQL port if it's not the default 3306

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}
?>
