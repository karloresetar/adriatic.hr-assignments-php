<?php
class MarketItem
{
    public $itemName;
    public $conditionInStock;
    public $price;
    public $supply;
    public $purchasePrice;
    public $deadlineForProcurement;

    public function __construct($itemName, $conditionInStock, $price, $supply, $purchasePrice, $deadlineForProcurement)
    {
        $this->itemName = $itemName;
        $this->conditionInStock = $conditionInStock;
        $this->price = $price;
        $this->supply = $supply;
        $this->purchasePrice = $purchasePrice;
        $this->deadlineForProcurement = $deadlineForProcurement;
    }
}

class MarketService
{
    private $marketItems;

    public function __construct($marketItems)
    {
        $this->marketItems = $marketItems;
    }

    public function getTotalValueOfGoods()
    {
        $totalValue = 0;

        foreach ($this->marketItems as $item) {
            $price = $this->extractPrice($item->price);
            $quantity = $this->extractQuantity($item->conditionInStock);

            if ($price !== false && $quantity !== false) {
                $totalValue += ($price * $quantity);
            }
        }

        return $totalValue;
    }

    private function extractPrice($priceString)
    {
        $parts = explode(' ', $priceString);
        if (count($parts) === 2) {
            $price = str_replace(',', '.', $parts[0]);
            return (float) $price;
        }
        return false;
    }

    private function extractQuantity($quantityString)
    {
        $parts = explode(' ', $quantityString);
        if (count($parts) === 2) {
            $quantity = str_replace(',', '.', $parts[0]);
            return (float) $quantity;
        }
        return false;
    }
}


$item1 = new MarketItem("paprika", "1225,25 kg", "0,89 €/kg", "-", "-", "-");
$item2 = new MarketItem("red potato", "600kg", "0,57 €/kg", "3000kg", "0,35€/kg", "2024-08-24");
$item3 = new MarketItem("yellow potato", "0kg", "-", "1200kg", "0,48€/kg", "2024-06-12");
$item4 = new MarketItem("young potato", "260,83 kg", "0,94€/kg", "6500kg", "0,50€/kg", "2024-04-15");
$item5 = new MarketItem("bulb 20W", "250 pc", "2,74€/pc", "300 pc", "1,25€/pc", "2024-04-20");

$marketService = new MarketService([$item1, $item2, $item3, $item4, $item5]);
$totalValue = $marketService->getTotalValueOfGoods();
echo "Total value of all goods in the warehouse: €" . number_format($totalValue, 2);
