<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'contacts';

// $host = 'sql102.epizy.com';
// $user = 'epiz_31774008';
// $pass = '5Sba6wR9fJjbq';
// $db_name = 'epiz_31774008_contacts';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database error: ' . $conn->connect_error);
} 

?>