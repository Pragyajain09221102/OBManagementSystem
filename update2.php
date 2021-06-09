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
</html>
<?php
include 'config.php';
$id=$_GET['id'];
$queryy="Select * from item where Id='$id'" ;
$dataa=mysqli_query($conn,$queryy);
$lt=0;
while($ress=mysqli_fetch_assoc($dataa))
{
    $naame=  htmlentities($ress['Name']);
    $up = $ress['UpdatedPrice'];
    $ud = $ress['UpdatedDiscount'];
$remark=  htmlentities($ress['Remarks']);
$lp=$ress['List Price'];
$disc = $ress['Discount'];
$lt=$ress['LessThanQty'];
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="update2.css" />
        <script src="update2.js"></script>
    </head>
    <body onload="load()">
        <div id="loader"></div>
        <div class="container">
           
            <form id="foraa" method="POST">
            <table class="table  table-striped table-hover table-bordered">
                <tr class="text-center">
                    
                    <td class="text-center" colspan="2">Edit Details</td>
                    
                </tr>
                <tr class="text-center">
                    <td>Id</td>
                    <td><input  type="text"   name="id" value="<?php $b=$_GET['id']; echo $b; ?>" readonly="readonly">
                </td>
                </tr>
                <tr class="text-center">
                    <td>Name</td>
                    <td><input  type="text" max="600000"  name="item" value="<?php echo $naame; ?>" readonly="readonly">
                </td>
                </tr>
                <tr class="text-center">
                    <td>Change Quantity</td>
                    <td><input  type="number" pattern=[0-9]{1} title="Only Numbers" value="0" name="qty" min="0" step="0.01"  id="i1">
                </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Price</td>
                    <td>
                <input  type="number" pattern=[0-9]{1} title="Only Numbers" step="0.01" min="0.01" name = "listp" id="i2" value="<?php  echo $lp; ?>"></td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Discount</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" value="<?php echo $disc ;?>" name="discount" step="0.01" min="0" max="100">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Remarks</td>
                    <td>
                        <input type="text" value="<?php echo $remark;?>" name="remarks" max="600000">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Existing Price</td>
                    <td>
                <input  type="number" pattern=[0-9]{1} title="Only Numbers" step="0.01" min="0.0" name = "up" id="i2" value="<?php echo $up; ?>"></td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Existing Discount</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" value="<?php echo $ud; ?>" name="ud" step="0.01" min="0" max="100">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Order Qty</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" value="<?php echo $lt; ?>" name="coq" min="1">
                    </td>
                </tr>
            </table><center><input type="submit" class="btn-success btn" value="Update" name="sub" onclick="fn1()" id="bb">
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
	function fn1()
        {
	document.getElementById("bb").style.display="none";
          document.getElementById("foraa").action="check6.php"  ;
          
        }
        </script>
    </body>
</html>