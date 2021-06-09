<?php
session_start();
?>
<?php
include 'config.php';
$sippy = $_GET['id'];
$_SESSION['inci']=$sippy;
$sippy1 = $_GET['id3'];
$_SESSION['inci1']=$sippy1;
$quee="Select * from $sippy1 where Id='$sippy' ";
$duee = mysqli_query($con,$quee);
while($reo=mysqli_fetch_assoc($duee))
{
    $a=$reo['Item'];
    $b=$reo['Qty'];
    $c=$reo['Price'];
}
?>
<html>
    <head>
        <link rel="stylesheet" href="update.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="update.js"></script>
        <style>
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
        <div class="container">
            <form id="foraa" method="POST">
            <table class="table  table-striped table-hover table-bordered">
                <tr class="text-center">
                    
                    <td class="text-center" colspan="3">Update Bill</td>
                    
                </tr>
                <tr class="text-center">
                    <td>Item</td>
                    <td>Change Price</td>
                    <td class="text-center">Change Quantity</td>
                    
                </tr>
                <tr class="text-center">
                    <td><input type="text" style="border:none;" name="vc" max="60000" value="<?php echo htmlentities($a); ?>" readonly="readonly">
                </td>
                    <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="<?php echo $c; ?>" name="x" min="0.01" step="0.01"  id="i1">
                </td>
                <td>
                <input type="number" pattern=[0-9]{1} title="Only Numbers" step="0.01" min="0.01" name = "r" id="i2" value="<?php echo $b; ?>"></td>
                
                </tr>
            </table><center><input type="submit" class="btn-success btn" value="Update" name="sub" onclick="fn1()">
                <input type="submit" class="btn-danger btn" value="Back" name="sub2" onclick="fn3()">
            </center></form>
        </div>
               <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>