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
if($con)
{
    $bil=$_SESSION['bi'];
    $query="DROP TABLE $bil" ;
    $da=mysqli_query($con,$query);
    if($da)
    {
        echo("<script>window.location.href='generate.php'; </script>");        
    }
    else
    {
        echo("<script>swal({ icon: 'error' , text: 'Denied' , buttons:{confirm:'Ok'}})</script>");        
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