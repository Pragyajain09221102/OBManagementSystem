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
$item = $_POST['qwert'];
$quantity = $_POST['r'];
include 'config.php';
if($conn)
{
    $query3="select * from item where name='$item'";
    $data3=mysqli_query($conn,$query3);
    $lp=0;
    $dis=0;
    $qty=0;
    while($result1=mysqli_fetch_assoc($data3))
    {
        $lp=$result1['List Price'];
        $dis=$result1['Discount'];
	$qty=$result1['Available'];
    }
    $qty1=$qty+$quantity;
    $amt=(float)$qty1*$lp;
    $amt1=(float)$dis/100;
    $amt2=(float)$amt*$amt1;
    $amt3=$amt-$amt2;
    $amm=round($amt3,2);
    date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
    $query4="update item set Available='$qty1' , Amount='$amm' where Name='$item' ";
    $data4=mysqli_query($conn,$query4);
   
    if($data4)
    {
        echo("<script>window.location.href='order.php';</script>");
    }
    else{
               echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Back'}}).then(val => {if(val){window.location.href='order.php'}}); </script>");
    }
}
else{
    echo("<script>swal({ icon: 'success' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
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