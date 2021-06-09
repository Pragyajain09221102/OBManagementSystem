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
echo("<script>swal({ icon: 'success' , text: 'Data Updated Successfully' , buttons:{confirm:'Ok' , cancel:'Back'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='add1.php'}}); </script>");
    }
    
    else{
        echo("<script>swal({ icon: 'error' , text: 'Updation Failed' , buttons:{confirm:'Back'}}).then(val => {if(val){window.location.href='add1.php'}}); </script>");
        }
        $quer="select * from outofstock where item='$item'";
        $dat=mysqli_query($conn,$quer);
        $tota=mysqli_num_rows($dat);
        if($tota!=0)
        {
            if($available1<=5)
            {
                $querr="update outofstock set Qty='$available1' where item='$item'" ;
                $daeer=mysqli_query($conn,$querr);
            }
            else{
                $querr1="delete from outofstock where item='$item'";
                $daeer1=mysqli_query($conn,$querr1);
            }
        }
        else{
            if($available1<=5)
            {
                $queer2="insert into outofstock('$item' , '$available1')";
                $daeer2=mysqli_query($conn,$queer2);
            }
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