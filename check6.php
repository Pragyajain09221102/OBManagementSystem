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
include 'config.php';

if($conn)
{
   
   $a=$_POST['item'];
   $b=$_POST['qty'];
   $c=$_POST['listp'];
   $d=$_POST['discount'];
   $e=$_POST['remarks'];
   $f=$_POST['id'];
   $up = $_POST['up'];
   $ud = $_POST['ud'];
   $coq = $_POST['coq'];
   $query="Select *from item where Id='$f'";
   $data=mysqli_query($conn,$query);
   while($result=mysqli_fetch_assoc($data))
   {
       $g=$result['Available'];
   }
   $actual=(float)$g+$b;
   $amt=(float)$c*$actual;
   $amt1=(float)$d/100;
   $amt2=(float)$amt1*$amt;
   $amt3=(float)$amt-$amt2;
   $amt4=round($amt3,2);
   date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
   $query1="Update item set Available='$actual',`List Price`='$c',Discount='$d',Amount='$amt4' , Remarks='$e' , UpdatedPrice='$up' , UpdatedDiscount='$ud' , LessThanQty='$coq' where Id='$f'";
   $data1=mysqli_query($conn,$query1);
   if($data1)
   {
       echo("<script>swal({ icon: 'success' , text: 'Details Updated Successfully' , buttons:{confirm:'Ok' , cancel:'Back'}}).then(val => {if(val){window.location.href='brand.php'}else{window.location.href='brand.php'}}); </script>");  
   }
   else if(!$data)
   {
         echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='brand.php'}}); </script>");    
   }
   else{
         echo("<script>swal({ icon: 'error' , text: 'Updn Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='brand.php'}}); </script>");    
   }
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
else{
   echo("<script>swal({ icon: 'error' , text: 'Invalid credentials, Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");    
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