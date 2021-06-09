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
if(isset($_POST['sup1']))
{
    $b = $_POST['er'];
    $e = $_POST['pr'];
    include 'config.php';
if($conn)
{   
    date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
    $query="update item set Price='$e' where name='$b'" ;
    
    $da=mysqli_query($conn,$query);
   if($da)
   {
       echo("<script>window.location.href='add.php';</script>");
   }
   else
   {
           echo("<script>swal({ icon: 'success' , text: 'Something Wrong' , buttons:{confirm:'Add'}}).then(val => {if(val){window.location.href='add.php'}});;</script>");
    
   }    
}
else{
    echo("Connection fail");
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