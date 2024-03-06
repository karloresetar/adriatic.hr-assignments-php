<?php
// require_once 'setup_db.php';
// require_once 'insert_db_data.php';

require_once 'database.php';
require_once 'market_service.php';

$db = Database::getInstance();

$marketService = new MarketService($db);

$totalValue = $marketService->getTotalValue();


echo "Total value of all goods in the warehouse: " . number_format($totalValue, 2) . " €";
?>
