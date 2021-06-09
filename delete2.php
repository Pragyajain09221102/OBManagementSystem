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
$a=$_GET['id'];
$_SESSION['item1']=$a;
           echo("<script>swal({ icon: 'info' , text: 'Want to delete this item from Database' , buttons:{confirm:'Yes' , cancel:'No'}}).then(val => {if(val){window.location.href='deletef.php'}else{window.location.href='brand.php'}});</script>");
?>