<?php
$servername = "localhost";
$username = "pma";
$password = "";
$dbname = "teswebphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
