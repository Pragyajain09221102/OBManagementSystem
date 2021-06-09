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
       </style>

    </head>
</html>
<?php
$id=$_GET['id'];
$bil=$_GET['id1'];
$_SESSION['item']=$id;
$_SESSION['billi']=$bil;
           echo("<script>swal({ icon: 'info' , text: 'Want to delete this item from bill' , buttons:{confirm:'Yes' , cancel:'No'}}).then(val => {if(val){window.location.href='updatei.php'}else{window.location.href='generate.php'}});</script>");
?>