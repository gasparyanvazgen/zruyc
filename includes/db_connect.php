<?php
$host = "hostname";
$username = "mysql_username";
$password = "mysql_password";
$database = "zruyc_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>