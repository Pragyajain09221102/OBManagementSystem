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
$price = $_POST['price'];
$discount = $_POST['das'];
$remarks=$_POST['remark'];
$available = 0 ;
include 'config.php';
if($conn)
{
    $query = "Select * from Item where Name = '$item' " ;
    $data = mysqli_query($conn , $query);
    while($result = mysqli_fetch_assoc($data))
    {
        $available = $result['Available'];
    }
    
    $available1 = $available + $quantity ;
    $amt = $available1*$price ;
    $discount1 = $discount/100 ;
    $disc = $amt*$discount1;
    $amt1 = $amt - $disc ;
    $amount = round($amt1 , 2);
    date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
    $query2 = "UPDATE item SET Available='$available1' , `List Price`='$price' , Discount='$discount' , Amount='$amount' , Remarks='$remarks' where Name='$item'" ;
    $data2  = mysqli_query($conn , $query2);
    if($data2)
    {
echo("<script>swal({ icon: 'success' , text: 'Data Updated Successfully' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='add.php'}}); </script>");        
    }
    else{
        echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Back'}}).then(val => {if(val){window.location.href='add.php'}}); </script>");
        }
        $quer="select * from item where name='$item'";
        $dat=mysqli_query($conn,$quer);
        while($resul=mysqli_fetch_assoc($dat))
        {
            $n=$resul['Available'];
            if($n>5)
            {
                $quer1="Delete from outofstock where Item='$item'" ;
                $dat1=mysqli_query($conn,$quer1);
            }
        }
}
else{
    echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
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