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
$bil=$_GET['id1'];
$_SESSION['ide1']=$bil;
           echo("<script>swal({ icon: 'info' , text: 'Want to confirm this bill' , buttons:{confirm:'Yes' , cancel:'No'}}).then(val => {if(val){window.location.href='check5.php'}else{window.location.href='bill.php'}});</script>");
?>