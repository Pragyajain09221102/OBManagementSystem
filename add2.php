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
include 'config.php';
if($conn)
{ 
    $query="Select Item from outofstock" ;
    $da=mysqli_query($conn,$query);
    $options="" ;
    while($table=mysqli_fetch_array($da))
    {
        $options=$options."<option class='o'>$table[0]</option>" ;
      }
}
else{
    echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
        
        <link rel="stylesheet" href="add2.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="add2.js"></script>
    </head>
    <body>
        <form name="form"  method="POST" id="fora" autocomplete="off" >
            <div class="container">
                
        
        <?php
        
            
                
$mn=$_GET['id'];
?>
        <table class="table table-striped table-hover table-bordered text-center" style="">
                         <tr class="bg-dark text-white text-center" style="font-size:25px ; text-align:center"><td colspan="2">ADD Stock</td></tr>  
            <tr class="bg-primary text-center text-white">
                <th>Item Name</th>
                <th>Change Quantity</th>
                
            </tr>
            <tr>
                <td><input type="text" name="qwert" readonly="readonly" value="<?php echo htmlentities($_GET['id']) ;?>" max="600000"></td>
                <td><input type="number" value="0" step="0.01" min="0" name = "r" id="i2"pattern=[0-9]{1} title="Only Numbers" ></td>
                
            </tr>
            <tr>
                 <tr class="text-center">
                     <td colspan="5"><center><input type="submit" class="btn-danger btn" style="font-size:20px ; font-weight: bold;width:170px;" value="Back"   onclick="fnb1()" >
                  <input type="submit" value="Update" id="bb" onclick="fnb()" class="btn-success btn" style="font-size:20px ; font-weight: bold;width:170px;" ></center></td>
                </tr>
            
        </table>
  
                </div>
  
        </form>
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
function fnb()
            {
		document.getElementById("bb").style.display="none";
                document.getElementById("fora").action="check7.php";
            }
</script>
    </body>
</html>