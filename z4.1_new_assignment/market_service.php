<?php

require_once 'database.php';

class MarketService
{
    public function getTotalValue()
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT price, condition_in_stock FROM Market";

        $result = $conn->query($sql);

        $totalValue = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $price = floatval(str_replace(',', '.', str_replace('€/kg', '', $row['price'])));
                $condition_in_stock = $row['condition_in_stock'];

                $quantity = $this->parseQuantity($condition_in_stock);

                $totalValue += ($price * $quantity);
            }
        }

        return $totalValue;
    }

    private function parseQuantity($condition_in_stock) 
    {
        if (preg_match('/(\d+(\,\d+)?)\skg/', $condition_in_stock, $matches)) {
            return floatval(str_replace(',', '.', $matches[1]));
        } elseif (preg_match('/(\d+)\spc/', $condition_in_stock, $matches)) {
            return intval($matches[1]);
        }
        return 0;
    }
}
?>
