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
$b=$_SESSION['item'];
$cd=$_SESSION['billi'];
if($con)
{ $query1="Select * from $cd";
    $da1=mysqli_query($con,$query1);
    $tot=mysqli_num_rows($da1);
    if($tot!=1)
    {
        $query="Delete from $cd where Id='$b' " ;
    $da=mysqli_query($con,$query);
    
    if($da)
    {
        echo("<script>window.location.href='generate.php';</script>");
    }
    else{
             echo("<script>swal({ icon: 'error' , text: 'Deletion Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='generate.php'}});</script>");
    }
    }
    else{
        $query2="Drop table $cd" ;
    $da2=mysqli_query($con,$query2);
    if($da2)
    {
        echo("<script>window.location.href='generate.php';</script>");
    }
    else{
             echo("<script>swal({ icon: 'error' , text: 'Deletion Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='generate.php'}});</script>");
    }
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