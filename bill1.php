<html>
<head>
<script src='sweetalert/dist/sweetalert.min.js'></script>
<style>
.swal-text{
          
 font-size:23px;
              
 font-weight:bold;
    
  }
</style>
</head>
</html>
<?php
include 'config.php';
if(isset($_GET['idm']))
{
if($conn)
{
    $fn=$_GET['idm'];
    $query="Select * from $fn";
    $data=mysqli_query($con,$query);
    while($result=mysqli_fetch_assoc($data))
    {
        $a=$result['Item'];
        $b=$result['Qty'];
        $query1="Select * from item where Name='$a'";
        $data1=mysqli_query($conn,$query1);
        while($result1=mysqli_fetch_assoc($data1))
        {
            $c=$result1['Available'];
            if($c>=$b)
            {
                $actual=$c-$b;
                date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
                $query2="Update item set Available='$actual' where name='$a'";
                $data2=mysqli_query($conn,$query2);
                $query3 = "Select * from outofstock where Item = '$a'";
                $data3 = mysqli_query($conn,$query3);
                $tot = mysqli_num_rows($data3);
                if($tot!=0)
                {
                    $query4="update outofstock set Qty='$actual' where item='$a'";
                    $data4=mysqli_query($conn,$query4);
                    
                }
            }
            else{
                   echo("<script>swal({ icon: 'error' , text: 'Bill cannot be confirmed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
}
else{
        echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
}
?>
<html>
    <head>
        <style>
            #loader{
               position: fixed;
               overflow: hidden;
               width: 100%;
               height:100vh;
               background:#fff url('images/Spinner-1s-200px.gif')no-repeat center;
               z-index:99999;
           }
        </style>
        <script>
        function ack()
           {
               window.location.href="generate.php";
           }
        </script>
<script src='sweetalert/dist/sweetalert.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="bill1.css" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="bill1.js"></script>
        <script src="printjs.js"></script>
    </head>
    <body onload="load()">
        <div id="loader"></div>
        
        <div class="d" id="d">
         <div class="c" id="c">
            <div class="d1"><center>Estimate/Quotation</center>
                <div class="p2">To :</div>
                <div class="p1">Date :</div> <div class="d4">&nbsp&nbsp<?php echo date('d/m/y'); ?></div><br>
                <div class="p4">M/s :</div><div class="d5"></div>
            </div><br>
         
           <form method="POST" id="flors">
    <div class="c3">
            <?php
include 'config.php';
if(isset($_GET['idm']))
{
if($conn)
{
   
$query="SELECT * FROM $fn";
$data=mysqli_query($con , $query);
$tot=mysqli_num_rows($data);
$idp=1;
$amt=0;
$amt2=0;
if($tot!=0)
{
?>
 
<table  class="table  text-center" >
<tr>
    <td>S.No.</td>
<td>Item_Name</td>
<td>Qty</td>
<td>Price(Rs.)</td>
<td>Amount(Rs.)</td>
<td>Remarks</td>
</tr>
<?php
$itemsArray = array();
while($result=mysqli_fetch_assoc($data)){
    
    array_push($itemsArray, array( 
        "sr" => $idp, 
        "name" => $result['Item'],
        "quantity" => $result['Qty'],
        "price" => $result['Price'],
        "amount" => $result['Amount']
        ));
    ?>
<tr>
    <td><?php echo $idp ; ?></td>
<td><?php echo $result['Item']; ?></td>
<td><?php $amt3 = $result['Qty']; echo $amt3 ?></td>
<td><?php echo $result['Price']; ?></td>
<td><?php $amt1 = $result['Amount']; echo($amt1); ?></td>
<td><?php echo $result['Remarks']; ?></td>
 </tr>  
 <?php
 $idp++;
 $amt=$amt+$amt1;
 $amt2=$amt2+$amt3;
}
//$resultField = array("type" => "BILL",
//    "nameOfPrinter" => "BILL",
//    "printerSize" => 80,
//    "content" => array(
//        "token"=> 0,
//        "discount_name"=> null,
//        "identity"=> null,
//        "brandName"=> null,
//        "outlet"=> "Estimate/Qoutation",
//        "customer_name"=> "",
//        "customer_number"=> "",
//        "address"=> "",
//        "header"=> "",
//        "footer"=> "",
//        "registrations"=> array(),
//        "total"=> $amt,
//        "sub_total"=> null,
//        "taxes"=> array(),
//        "discount"=> 0,
//        "invoice_number"=> 1,
//        "external_id"=> null,
//        "source"=> null,
//        "order_type"=> null,
//        "time"=> date('d/m/y'),
//        "table"=> "",
//        "user"=> null,
//        "payment_mode"=> "",
//        "delivery_charge"=> null,
//        "packaging_charge"=> null,
//        "special_instructions"=> null,
//        "delivery_instructions"=> null,
//        "items" => $itemsArray
//));
$resultField = array("items" => $itemsArray);
?>
 <tr>
     <td></td>
     <td>TOTAL</td>
     <td><div style='border-bottom: 1px solid black ; border-top: 1px solid black;'><?php echo($amt2); ?></div></td>
     <td></td>
     <td><div style='border-bottom: 1px solid black ; border-top: 1px solid black;'><?php echo ('Rs.'.$amt); ?></div></td>
     <td></td>
 </tr>
 <tr>
     <td colspan="6" style="text-align:left;">GST 18% EXTRA</td>
 </tr>
     <tr>
    <td colspan="6">
        <script>
            var tempPrint = <?php echo json_encode($itemsArray); ?>;
            tempPrint = JSON.stringify(tempPrint);
        </script>
          
        <button type="button" style="font-size:20px; font-weight:bold;width:180px" id="bb1" class="btn-primary btn" 
                onclick="f9(tempPrint)">Print</button>
        <button class="btn-warning btn text-center" style="font-weight:bolder;font-size:20px ; width:180px ; "><a id="a1" style="text-decoration: none;" class="text-center text-white" href='back.php?id1=<?php echo $fn; ?>'>Generate New</a></button>
</td>
     </tr>
 <?php
}
else{
              echo("<script>swal({ icon: 'error' , text: 'No records found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='generate.php'}});</script>");
}
}
else
{
echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
}

?>

</table>
</form>
   
           
    </div>
    
         
         </div>
        </div>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>        
</html>    

        