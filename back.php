<?php
include 'config.php';
if($con)
{
if(isset($_GET['id1']))
{
$fn = $_GET['id1'];
    $queer = "DROP table $fn";
$data = mysqli_query($con,$queer);
if($data){
    echo("<script>window.location.href='generate.php';</script>");
}
  }
}
else{
        echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
?>