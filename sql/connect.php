<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'contacts';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database error: ' . $conn->connect_error);
} 

?>