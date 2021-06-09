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
$d=0;
$e=0; 
$f=0;
$g=0;
$h=0;                                                 
$i=0; 
$id=1;
if($conn)
{
    $query="select * from item";
    $data=mysqli_query($conn , $query);
    while($res=mysqli_fetch_assoc($data))
    {
        $a = $res['Name'];
        $b = $res['Available'];
        $c = $res['List Price'];
        $d = $res['Discount'];
        $e = $b*$c;
        $f = (float)$d/100;
        $g = (float)$e*$f;                                  
        $h = (float)$e-$g;
        $i = round($h , 2);
        date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
        $query1="update item set Amount='$i' where Name='$a'";
        $dataa=mysqli_query($conn , $query1);
        date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
        $querry="Update item set Id='$id' where name='$a'";
        $dda=mysqli_query($conn,$querry);
        $id++;
    }
    if($dataa)
    {
        echo("<script>window.location.href='home.php';</script>");
    }
    else{
        echo("WRONG");
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