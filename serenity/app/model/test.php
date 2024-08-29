<?php
include 'database.php';

$database = new Database();
$conn = $database->getConn();

if ($conn) {
    echo "Connection established successfully.";
} else {
    echo "Failed to connect to the database.";
}
?>