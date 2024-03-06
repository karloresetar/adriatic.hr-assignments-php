<?php

$servername = "localhost";
$username = "root";
$password = "Mysql@123";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_db = "CREATE DATABASE adriatic_db2";
if ($conn->query($sql_db) === TRUE) {
    echo "Database created successfully </br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db("adriatic_db2");

$sql_table = "CREATE TABLE Market (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(255) NOT NULL,
    condition_in_stock VARCHAR(255),
    price VARCHAR(255),
    supply VARCHAR(255),
    purchase_price VARCHAR(255),
    deadline_for_procurement DATE
)";

if ($conn->query($sql_table) === TRUE) {
    echo "Table Market created successfully </br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
