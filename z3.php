<?php
class Accommodation
{
    public $id;
    public $name;
    public $startDate;
    public $endDate;
    public $numPersons;
    public $price;
    public $currency;
    public $quantity;

    public function __construct($id, $name, $startDate, $endDate, $numPersons, $price, $currency, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->startDate = new DateTime($startDate);
        $this->endDate = new DateTime($endDate);
        $this->numPersons = $numPersons;
        $this->price = $price;
        $this->currency = $currency;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getNumPersons()
    {
        return $this->numPersons;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}

class Payment
{
    public $name;
    public $paymentMethod;
    public $paymentTime;
    public $amount;

    public function __construct($name, $paymentMethod, $paymentTime, $amount)
    {
        $this->name = $name;
        $this->paymentMethod = $paymentMethod;
        $this->paymentTime = $paymentTime;
        $this->amount = $amount;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}

$id = 16950;
$accommodation = new Accommodation($id, "AS-$id-a", "2022-08-08", "2022-08-15", 2, 104.00, '€', 7);

$payment1 = new Payment("Akontacija", "Kreditnom karticom (Visa, EC/MC, Maestro)", "Najkasnije " . $accommodation->startDate->format('d.m.Y') . " do 11:00", number_format(($accommodation->price * $accommodation->quantity) / 2, 2, ',', '.') . ' ' . $accommodation->currency);


$payment2 = new Payment("Ostatak iznosa", "Kreditnom karticom (Visa, EC/MC, Maestro)",  "Najkasnije " . $accommodation->startDate->format('d.m.Y') . " do 15:00", number_format(($accommodation->price * $accommodation->quantity) / 2, 2, ',', '.') . ' ' . $accommodation->currency);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>z3</title>
    <style>
        h2 {
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .paragraph-container {
            text-align: left;
            margin-left: 12.5%;
        }

        table {
            border-collapse: collapse;
            width: 75%;
            border: 3px solid #1a74b4;

        }

        th {
            font-weight: bold;
            background-color: #81bfed;
        }

        th,
        td {
            border: 1px solid #1a74b4;
            padding: 8px;
            text-align: center;
        }


        .left-border {
            border-left: 3px solid #1a74b4;
        }

        .last-column {
            font-weight: bold;
            background-color: #81bfed;
        }
    </style>
</head>

<body>
    <h2>PREDRAČUN BR. <?php echo $accommodation->getStartDate()->format('Y') ?>-<?php echo $accommodation->getId() ?>-63 ZA USLUGU SMJEŠTAJA</h2>

    <div class="table-container">
        <table>
            <tr>
                <th colspan="3">Usluga</th>
                <th class="left-border">Cijena</th>
                <th class="left-border">Količina</th>
                <th class="left-border">Ukupno</th>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold;"><?php echo $accommodation->getName() ?></td>
                <td><?php echo $accommodation->getStartDate()->format('d.m.Y') ?> - <?php echo $accommodation->getEndDate()->format('d.m.Y') ?></td>
                <td><?php echo $accommodation->getNumPersons() ?> (osobe)</td>
                <td class="left-border" style="text-align: right;"><?php echo number_format($accommodation->getPrice(), 2, ',', '.') ?> <?php echo $accommodation->getCurrency() ?></td>
                <td class="left-border"><?php echo $accommodation->getQuantity() ?> (noćenja)</td>
                <td class="left-border" style="text-align: right;"><?php echo number_format($accommodation->getPrice() * $accommodation->getQuantity(), 2, ',', '.') ?> <?php echo $accommodation->getCurrency() ?></td>

            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr class="last-column">
                <td colspan="5" style="text-align: left;">Ukupno</td>
                <td class="left-border" style="text-align: right;"><?php echo number_format($accommodation->getPrice() * $accommodation->getQuantity(), 2, ',', '.') ?> <?php echo $accommodation->getCurrency() ?></td>
            </tr>

        </table>
    </div>

    <p class="paragraph-container">Uključeno u cijenu (bez dodatne naplate): turistička pristojba</p>

    <h2>DINAMIKA PLAČANJA</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>Uplata</th>
                <th>Naćin plaćanja</th>
                <th>Vrijeme plaćanja</th>
                <th>Iznos</th>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold;"><?php echo $payment1->getName() ?></td>
                <td><?php echo $payment1->getPaymentMethod() ?></td>
                <td><?php echo $payment1->getPaymentTime() ?></td>
                <td style="text-align: right; font-weight: bold;"><?php echo $payment1->getAmount() ?></td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold;"><?php echo $payment2->getName() ?></td>
                <td><?php echo $payment2->getPaymentMethod() ?></td>
                <td><?php echo $payment2->getPaymentTime() ?></td>
                <td style="text-align: right; font-weight: bold;"><?php echo $payment2->getAmount() ?></td>
            </tr>
        </table>
    </div>

    <p class="paragraph-container">Uplatom akontacije gost potvrđuje da je upoznat te se slaže s Općim uvjetima pružanja accommodation smještaja u privatnim kapacitetima.</p>
</body>

</html>