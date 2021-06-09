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

include 'config.php';
$b=$_SESSION['item1'];
if($conn)
{ 
    $query1="Select * from outofstock where item='$b'";
    $data1=mysqli_query($conn,$query1);
    $total=mysqli_num_rows($data1);
    if($total!=0)
    {
        $query2="Delete from outofstock where item='$b'";
        $data2=mysqli_query($conn,$query2);
    }
  date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
    $query="Delete from item where Name='$b' " ;
    $da=mysqli_query($conn,$query);
    if($da)
    {
        echo("<script>window.location.href='brand.php';</script>");
    }
    else{
             echo("<script>swal({ icon: 'error' , text: 'Deletion Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='brand.php'}});</script>");
    }
}
else{
    echo("Connection fail");
}
session_destroy();
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