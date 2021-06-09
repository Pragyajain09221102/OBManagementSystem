<?php
session_start();
?>
<html>
    <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src='sweetalert/dist/sweetalert.min.js'></script>

        <style>
            .swal-text{
               font-size:23px;
               font-weight:bold;
            }
                   .container{
    min-height:400px;
    height:auto;
    padding-top:10px;
border:4px solid black;
margin-top:20px;
width:auto;
min-width: 100%;
float: left;
}
.table{
    font-weight:bold;
    font-size:20px;
}
input{
    font-size:23px;
    text-align: center;
}
.btn{
    font-weight:bold;
    font-size:23px;
    width:150px;
}
input:disabled{
    background-color: white;
    border:none;
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
            <script>
                function fn1()
                {
                    document.getElementById("frm").action="edit1.php";
		    document.getElementById("bb").style.display="none";
                }
                function fn3()
                {
                    document.getElementById("frm").action="edi.php"; 
                }
            </script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src='sweetalert/dist/sweetalert.min.js'></script>

    </head>
    <body onload="load()">
        <div id="loader"></div>
        <form id="frm" method="POST">
        <div class="container" id="contain">
            <?php
            include 'config.php';
            if($conn)
            {
                
            }
            else{
   echo("<script>swal({ icon: 'error' , text: 'Invalid credentials, Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");    
}
            ?>
<?php
if(isset($_POST['records']) && count($_POST['records'])>=2)
{
$check=count($_POST['records']);
$_SESSION['total']=$check;
for($i=0 ; $i<$check ; $i++)
{
    
    $fs=$_POST['records'][$i];
    $query="Select * from item where Id='$fs'";
    $data=mysqli_query($conn,$query);
    $lt = 0;
    while($result=mysqli_fetch_assoc($data))
    {
        $id=$result['Id'];
        $item=$result['Name'];
        $lp=$result['List Price'];
        $discount=$result['Discount'];
        $remarks=$result['Remarks'];
        $updatep = $result['UpdatedPrice'];
        $updated = $result['UpdatedDiscount'];
        $lt = $result['LessThanQty'];
    }
    ?>
            
<table class="table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center" style="font-size:25px ; text-align:center"><td colspan="2">Edit Details</td></tr> 
    <tr class="text-center">
        
    <td colspan="2">Record #<?php echo($i+1); ?></td><br>
    
    </tr>
    <tr class="text-center">
        <td>Id</td>
        <td><input name="id[]" style="width:70%" type="text" value="<?php echo $id;  ?>" max="600000000" readonly="readonly"></td><br>
    </tr>
    <tr class="text-center">
        <td>Item Name</td>
        <td><input name="item[]" style="width:70%" type="text" value="<?php echo htmlentities($item);  ?>" max="600000000" readonly="readonly"></td><br>
    </tr>
    <tr class="text-center">
        <td >Change Quantity</td>
    <td><input style="width:70%" type="number" pattern=[0-9]{1} title="Only Numbers" value="0" name="qty[]" min="0" step="0.01"  id="i1"></td>
    </tr>
    <tr class="text-center">
                    <td class="text-center">Change Price</td>
                    <td>
                <input style="width:70%" type="number" pattern=[0-9]{1} title="Only Numbers" step="0.01" min="0.01" name = "listp[]" id="i2" value="<?php echo $lp; ?>"></td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Discount</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" style="width:70%" value="<?php echo $discount ;?>" name="discount[]" step="0.01" min="0" max="100">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Remarks</td>
                    <td>
                        <input type="text" style="width:70%" value="<?php echo htmlentities($remarks) ;?>" name="remarks[]" max="600000">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Existing Price</td>
                    <td>
                <input style="width:70%" type="number" pattern=[0-9]{1} title="Only Numbers" step="0.01" min="0" name = "updatedp[]" id="i2" value="<?php echo $updatep; ?>"></td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Existing Discount</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" style="width:70%" value="<?php echo $updated ;?>" name="updatedd[]" step="0.01" min="0" max="100">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="text-center">Change Order Qty</td>
                    <td>
                        <input type="number" pattern=[0-9]{1} title="Only Numbers" style="width:70%" value="<?php echo $lt; ?>" name="coq[]"  min="1">
                    </td>
                </tr>

<?php
}
?>
            <tr>
                <td colspan="2"><center><input style="width:170px; font-size: 20px;font-weight: bold ; border:2px solid black; padding-bottom: 10px;" type="submit" class="btn-success btn" value="Update" name="sub" onclick="fn1()" id="bb">
                <input type="submit" class="btn-danger btn" value="Back" style="width:170px; font-size: 20px;font-weight: bold ; border:2px solid black; padding-bottom: 10px;" name="sub2" onclick="fn3()">
            </center></td></tr>
</table>
<?php
}
else{
      echo("<script>swal({ icon: 'error' , text: 'Please select atleast 2 records' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='edi.php'}}); </script>");    
echo("<script>document.getElementById('contain').style.border='none'</script>");
      }

?>
    
        </div></form>
        <script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>