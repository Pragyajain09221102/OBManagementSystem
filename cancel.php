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
$_SESSION['bi']=$bil;
           echo("<script>swal({ icon: 'info' , text: 'Are you Sure, want to cancel bill' , buttons:{confirm:'Yes' , cancel:'No'}}).then(val => {if(val){window.location.href='cancel1.php'}else{window.location.href='generate.php'}});</script>");
?>