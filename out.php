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
    $delete="Truncate table outofstock" ;
    $delete1=mysqli_query($conn,$delete);
    $query="Select * from Item " ;
    $data=mysqli_query($conn,$query);
    while($result=mysqli_fetch_assoc($data))
    {
        $a = $result['Available'];
        $b = $result['Name'];
        if($a<=5)
        {
           $query1="Select * from outofstock where item='$b'";
           $data1=mysqli_query($conn,$query1);
           $tot=mysqli_num_rows($data1);
           if($tot==0)
           {
               $query2="Insert into outofstock values('$b' , '$a')";
               $data2=mysqli_query($conn,$query2) ;
               if($data2)
               {
               echo("<script>window.location.href='order.php';</script>");           
               }
           }
           else{
               $query3="update outofstock set Qty='$a' where item='$b'";
               $data3=mysqli_query($conn,$query3);
               echo("<script>window.location.href='order.php';</script>");
           }
        }
    }
    $query4="Select * from outofstock";
    $daer=mysqli_query($conn,$query4);
    $tot1=mysqli_num_rows($daer);
    if($tot1==0)
    {
        echo("<script>swal({ icon: 'info' , text: 'All items available' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='home.php'}}); </script>");        
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