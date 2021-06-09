<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
           #loader{
               position: fixed;
               overflow: hidden;
               width: 100%;
               height:100vh;
               background:#fff url('images/Spinner-1s-200px.gif')no-repeat center;
               z-index:99999;
           }
       </style>
    </head>
<body onload="load()">
        <div id="loader"></div>
<?php
session_start();
$a=$_SESSION['total'];
include 'config.php';
if($conn)
{
for($i=0 ; $i<$a ; $i++)
{
    $id=$_POST['id'][$i];
    $item=$_POST['item'][$i];
    $quantity=$_POST['qty'][$i];
    $price=$_POST['listp'][$i];
    $discount=$_POST['discount'][$i];
    $remarks=$_POST['remarks'][$i];
    $updatep = $_POST['updatedp'][$i];
    $updated = $_POST['updatedd'][$i];
    $coq = $_POST['coq'][$i];
    $query="Select *from item where Id='$id'";
   $data=mysqli_query($conn,$query);
   while($result=mysqli_fetch_assoc($data))
   {
       $g=$result['Available'];
   }
   $actual=(float)$g+$quantity;
   $amt=(float)$price*$actual;
   $amt1=(float)$discount/100;
   $amt2=(float)$amt1*$amt;
   $amt3=(float)$amt-$amt2;
   $amt4=round($amt3,2);
   date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
   $query1="Update item set Available='$actual',`List Price`='$price',Discount='$discount',Amount='$amt4' , Remarks='$remarks' , UpdatedPrice='$updatep' , UpdatedDiscount='$updated' , LessThanQty='$coq' where Id='$id'";
   $data1=mysqli_query($conn,$query1);
   if($actual<=5)
   {
       $queer="Select * from outofstock where item = '$a'";
       $daer=mysqli_query($conn,$queer);
       $tot=mysqli_num_rows($daer);
       if($tot==0)
       {
           $queer1="Insert into outofstock values('$a' , '$actual')" ;
           $daer1=mysqli_query($conn,$queer1);
           
       }
       else{
           $queer4="Update outofstock set Qty='$actual' where item='$a'";
           $daer4=mysqli_query($conn,$queer4);
       }
   }
   else{
       $queer2="Select * from outofstock where item = '$a'";
       $daer2=mysqli_query($conn,$queer2);
       $tot1=mysqli_num_rows($daer2);
       if($tot1!=0)
       {
           $queer3="Delete from outofstock where item='$a'";
           $daer3=mysqli_query($conn,$queer3);
       }
   }
}
if($data1)
   {
       echo("<script>swal({ icon: 'success' , text: 'Details Updated Successfully' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='brand.php'}}); </script>");  
   }
   else if(!$data)
   {
         echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='brand.php'}}); </script>");    
   }
   else{
         echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='brand.php'}}); </script>");    
   }
}
?>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>