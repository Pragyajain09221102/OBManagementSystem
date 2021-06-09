<?php
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/* Fill in your own connector here */
$connector = new WindowsPrintConnector("smb://DESKTOP-88P7UDN/POS-80-Series");

/* Information for the receipt */
//$items = array(
//    new item("1","Example item #1", "3", "4.00", "4.00"),
//    new item("2","Another thing", "2", "3.50", "4.00"),
//    new item("3","Something else", "1", "1.00", "4.00"),
//    new item("4","A final item", "10", "4.45", "4.00"),
//);
$itemsArray = json_decode($_POST['items'], true);
$items = array();
$totalQuantity = 0;
$totalAmount = 0;
foreach ($itemsArray as $value) {
    $nameLength = strlen($value['name']);
    $rows = ceil($nameLength/25);
    $e=25;
    for($i=0 ; $i < $rows ; $i++)
    {
        if($i == 0)
        {
            array_push($items, 
            new item($value['sr'], substr($value['name'],0,25), $value['quantity'], $value['price'], $value['amount']));        
        }
        else{
           array_push($items, new item('', substr($value['name'], $i*25, 25), '','',''));
        }
    }
    
    $totalQuantity = $totalQuantity + $value['quantity'];
    $totalAmount = $totalAmount + $value['amount'];
  }
$total = new item('', 'Total', $totalQuantity, '', 'Rs.'.$totalAmount);

date_default_timezone_set('Asia/Kolkata');
//$date = date('jS F Y h:i:s A');
$date = date('jS F, Y');

/* Start the printer */
$printer = new Printer($connector);

/* Name of shop */
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Estimate/Quotation\n");
$printer -> selectPrintMode();
$printer -> feed();

/* Title of receipt */
$printer -> setEmphasis(true);
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("To:\n");
$printer -> setEmphasis(false);
$printer -> feed();

/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item('Sr', 'Item', 'Qty', 'Price', 'Amount'));
$printer -> setEmphasis(false);
foreach ($items as $item) {
    $printer -> text($item);
}
$printer -> feed();

/* Tax and total */
$printer -> setEmphasis(true);
$printer -> text($total);
$printer -> setEmphasis(false);

/* Footer */
$printer -> feed(1);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("GST EXTRA\n");
$printer -> feed(1);
$printer -> text($date . "\n");
$printer -> feed(1);
/* Cut the receipt and open the cash drawer */
$printer -> cut();
$printer -> pulse();

$printer -> close();
echo json_encode(array("success"=>true));


/* A wrapper to do organise item names & prices into columns */
class item
{
    private $srno;
    private $name;
    private $quantity;
    private $price;
    private $amount;

    public function __construct($srno = '', $name = '', $quantity = '', $price = '', $amount = '')
    {
        $this -> srno = $srno;
        $this -> name = $name;
        $this -> quantity = $quantity;
        $this -> price = $price;
        $this -> amount = $amount;
    }

    public function __toString()
    {
        $srnoColumn = str_pad($this -> srno, 3) ;
        $nameColumn = str_pad($this -> name, 25) ;
        $quantityColumn = str_pad($this -> quantity, 4, ' ', STR_PAD_LEFT) ;
        $priceColumn = str_pad($this -> price, 8, ' ', STR_PAD_LEFT) ;
        $amountColumn = str_pad($this -> amount, 8, ' ', STR_PAD_LEFT) ;

        return "$srnoColumn$nameColumn$quantityColumn$priceColumn$amountColumn\n";
    }
}
?>