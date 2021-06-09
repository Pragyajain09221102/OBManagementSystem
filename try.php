<?php
include 'config.php';
$query = "SELECT *, SUM(Available) FROM item"; 
	 
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
$v = $row['SUM(Available)'];
	
}
$w=round($v,2);
$query1="Select * from item";
$data1=mysqli_query($conn,$query1);
$tot = mysqli_num_rows($data1);
$qw=0;
$qe=0;
if($tot!=0)
{
while($result=mysqli_fetch_assoc($data1))
{
 $a=$result['Id'];
 $c=$result['Available'];
 $d=$result['List Price'];
 $e=$result['Discount'];
$amt = (float)$c*(float)$d;
$amt1=(float)$e/100;
$amt2=(float)$amt*(1-$amt1);
$amt3=round($amt2,2);
date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
$query2="Update item set Amount='$amt3' where Id='$a'" ;
$data2 = mysqli_query($conn,$query2);
}
$query3 = "SELECT *, SUM(Amount) FROM item";
$result3 = mysqli_query($conn,$query3);
while($row1 = mysqli_fetch_array($result3)){
$sum = $row1['SUM(Amount)'];
	
}
$sum1=round($sum,2);
}
?>
<html>
    <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src='sweetalert/dist/sweetalert.min.js'></script>
     <link rel="stylesheet" href="brand.css"/>
        <style>
            .swal-text{
               font-size:23px;
               font-weight:bold;
           }
           

            </style>
            <script>
            function fne()
            {
                document.getElementById('f1').action="backup.php" ;
            }
            </script>
            
            <script src="brand.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src='sweetalert/dist/sweetalert.min.js'></script>

    </head>
    <body>
      
        <form id="f1" method="post">
        <div class="container">
            <div class="c1">
            <table border="2px" class="table" id="tab">
                <thead>
                    <tr class="bg-primary text-white text-center">
  
                            
                        <th>S.No.</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>List Price(Rs.)</th>
    <th>Discount(%)</th>
    <th>Amount(Rs.)</th>
    <th>Remarks</th>
    
    <th>Edit</th>
   <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tcontent">
                    <?php include 'load1.php'; ?>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                         
                        <td></td>    
    <td style="font-weight:bold; font-size:23px;">Total</td>
    <td style="border-top:2px solid black ; border-bottom:2px solid black; font-weight:bold; font-size:20px;"><?php echo $w; ?></td>
    <td></td>
    <td></td>
    
    <td style="border-top:2px solid black ; border-bottom:2px solid black; font-weight:bold; font-size:20px;"><?php echo $sum1; ?></td>
    <td></td>
    <td></td>
    <td></td>
    
    
  
                    </tr>
                </tfoot>
            </table>

            </table>
                
        <br><br>
              <center>
                  <button type='submit' name="backup" class="b1" onclick="fne()">Backup Data</button>
    <button type='button' class="b1" onclick="fn11()">Sale</button>
    <button type='button' class="b1" onclick="fn15()">Check Order</button>
    <button type='submit' class="b1" onclick="edit()">Edit</button>
<button type='button' class="b1" onclick="fn12()">Back</button>
</center>
            </div></div>
        
        </form>
    </body>
</html>
