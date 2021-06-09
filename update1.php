<?php
session_start();
?>
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
$v=$_SESSION['inci'];
$bi=$_SESSION['inci1'];
$w=$_POST['x'];
$x=$_POST['r'];
include 'config.php';
if($conn)
{ 
   $query="Select * from $bi where Id='$v'" ;
   $data = mysqli_query($con , $query);
   while($res = mysqli_fetch_assoc($data))
   {
       $dis = $res['Discount'];
       $dis1 = $res['List Price'];
       
   }
   $queerr="Select * from item where id='$v'";
   $dao=mysqli_query($conn,$queerr);
   while($resa=  mysqli_fetch_assoc($dao))
   {
       $avail=$resa['Available'];
   }
   if($x<=$avail)
   {
   $dis2 = $dis1-$w ;
   $dis3 = $dis2/$dis1;
   $d3 = $dis3*100;
  $d4 = round($d3 , 2);
  $amtt = $w*$x;
  $amtt1 = round($amtt , 2);
   $query1="Update $bi set Discount='$d4' , Price='$w' , Qty='$x' , Amount='$amtt1' where Id='$v'" ;
   $data1 = mysqli_query($con , $query1);
   if($data1)
   {
       header('location:generate.php?id='.$bi);
   }
   else{
            echo("<script>swal({ icon: 'error' , text: 'Fail' , buttons:{confirm:'Ok'}});</script>");
    
   }
   }
   else{
           echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
   }
}
else{
         echo("<script>swal({ icon: 'success' , text: 'Do you want to print or go to home page' , buttons:{confirm:'Print' , cancel:'Home'}});</script>");
    
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