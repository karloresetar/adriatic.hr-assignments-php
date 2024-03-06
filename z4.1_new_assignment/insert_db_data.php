<?php

require_once 'database.php';


$db = Database::getInstance();
$conn = $db->getConnection();

$data = array(
    array("paprika", "1225,25 kg", "0,89 €/kg", "", "", ""),
    array("red potato", "600 kg", "0,57 €/kg", "3000kg", "0,35€/kg", "2024-08-24"),
    array("yellow potato", "0 kg", "", "1200 kg", "0,48€/kg", "2024-06-12"),
    array("young potato", "260,83 kg", "0,94€/kg", "6500 kg", "0,50€/kg", "2024-04-15"),
    array("bulb 20W", "250 pc", "2,74€/pc", "300 pc", "1,25€/pc", "2024-04-20")
);

$stmt = $conn->prepare("INSERT INTO Market (item, condition_in_stock, price, supply, purchase_price, deadline_for_procurement) VALUES (?, ?, ?, ?, ?, ?)");


foreach ($data as $row) {
    $params = array_map(function($value) {
        return ($value === "") ? null : $value;
    }, $row);

    $stmt->bind_param("ssssss", ...$params);
    
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "Data inserted successfully <br>\n";

?>
