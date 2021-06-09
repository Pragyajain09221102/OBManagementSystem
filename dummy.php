<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
       </style>
       <script>
           function cack()
{
          document.getElementById("fora").action="brand.php";
}
       </script>
    </head>
</html>
<?php
include 'config.php';
if($conn)
{ 
    $query="Select * from item" ;
    $da=mysqli_query($conn,$query);
    $options="" ;
    while($table=mysqli_fetch_array($da))
    {
        $ac=$table['Id'];
        $fc=$table['Name'];
        $options=$options."<option value=$ac>$fc</option>" ;
    }
   
}
else{
    echo("Connection fail");
}
//For dynamic selec box//
?>
<?php
include 'config.php';
    $query="Select table_name from INFORMATION_SCHEMA.TABLES where table_schema like'%tutorial%' AND create_time like '%2020-05-21%'" ;
    $da=mysqli_query($conn,$query);
    $options1="" ;
    while($table=mysqli_fetch_array($da))
    {
        
        $options1=$options1."<option>$table[0]</option>" ;
    }
?>
<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="generate.js"></script>
<link rel="stylesheet" href="generate.css" />
<script>
     function f()
            {
                swal({ icon: 'info' , text: 'Are you Sure, you want to cancel!' , buttons:{confirm:'No' , cancel:'Yes'}}).then(val => {if(val){window.location.href='generate.php'}else{window.location.href='cancel.php'}}); 
       
            }
            
           
</script>
    </head>
    <body>
        <form name="form"  method="POST" id="fora" autocomplete="off">
            <div class="container">
                <br>       
                <table class="table table-striped table-hover table-bordered" style="width:100%">
                <tr class="bg-primary text-center text-white"><td colspan="4" style="font-size:32px"><center>Generate Bill</center></td></tr>
                 <tr style="font-weight: bolder; ">
                        <th colspan="4">Create New Bill : <input type="text" autocomplete="off" name="bill"></th>
                    </tr>
                <tr class="text-center" style="font-weight: bolder; ">
                        <th>Item Name</th>
                        <td class="text-center"><select class="form-control select2" id="sel" name="item"  onchange="myfun(this.value)">
             <option class="o1" >Select One</option>
            <?php echo $options ; ?>
        </select>
                </td>
                <th>Quantity</th>
                 <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0"  min="0.01" step="0.01" name = "quantity" id="i2" ></td>
                    </tr>
                 <tr class="text-center" style="font-weight: bolder; ">
                     <th>Price</th>   
             <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0" min="0.0" step="0.01" name = "price" id="i4"  oninput="gn()"></td>
             <th>Discount</th>
             <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0" min="0.0" max="100" step="0.01" name = "discount" id="i3"  oninput="gn1()" style="width:245px"></td>
                 </tr>
             <tr class="text-center" style="font-weight: bolder; "> 
                 <th>Remarks</th>
                 <td><center><p id="rem" style="border:2px solid black;max-width:70%">Nothing</p></center></td>
             <th>Available</th>           
             <td><input type="text" id="avai" readonly="readonly" value="0"></td>
             </tr>
             <tr class="text-center" style="font-weight: bolder; "> 
             <td colspan="4"> <input type="submit" class="btn-success btn" value="Add" name="sub" onclick="fn1()"></td>
                 </tr>
                </table>
<?php


$query="SELECT * FROM sample";
$data=mysqli_query($conn , $query);
$tot=mysqli_num_rows($data);
$id=1;
if($tot!=0)
{
?>
<table  class="table table-striped table-hover table-bordered" >
    <tr class="bg-dark text-white text-center">
        <th>Id</th>
    <th>Item_Name</th>
    <th>Qty</th>
    <th>List Price</th>
    <th>Discount(%)</th>
    <th>Price(Rs.)</th>
    <th>Amount(Rs.)</th>
    <th>Remarks</th>
    <th>Delete</th>
    <th>Update</th>
</tr>
<tr class="text-center">
<?php
while($result=mysqli_fetch_assoc($data)){
?>
    <td class='text-center'><?php echo($id); ?> </td>
<td class='text-center'><?php echo($result['Item']); ?> </td>
<td class='text-center'><?php echo($result['Qty']); ?></td>
<td class='text-center'><?php echo($result['List Price']); ?></td>
    <td class='text-center'><?php echo($result['Discount']); ?></td>
        <td class='text-center'><?php echo($result['Price']); ?></td>
            <td class='text-center'><?php echo($result['Amount']); ?></td>
<td class='text-center'><?php echo($result['Remarks']); ?></td>

    <td class="text-center"><button class="btn-danger btn text-center"><a id="a1" class="text-center text-white" href='delete.php?id=<?php echo urlencode($result['Item']); ?>'>Delete</a></button>
    <td class="text-center"><button class="btn-success btn text-center"><a id="a1" class="text-center text-white" href='update.php?id=<?php echo urlencode($result['Item']); ?>&id1=<?php echo $result['Price']; ?>&id2=<?php echo $result['Qty']; ?>'>Update</a></button>
    </td></tr>

<?php
$id++;
}
?>
<tr class="text-center">
    <td colspan="10"><button type='button' class="btn-danger btn" onclick = "f();this.disabled=true;" style="font-weight:bolder;font-size:23px ; width:200px">Cancel</button> 
                     <button class="btn-success btn" onclick="fn2()" style="font-weight:bolder;font-size:23px ; width:200px"> Bill</button></td>
</tr>
<?php
}

?>   

</table>
                </div>
            <script>
                     $('.select2').select2({
                         dropupAuto:false ,
                     });
            </script>
                     <script>
                     $('#see').select2({
                         dropupAuto:false ,
                     });
            </script>
                   <script>
function myfun(datavalue)
{
	$.ajax({
		url:'fetch.php',
		dataType:'json',
		type:'POST',
		async:'false',
		data:{ item : datavalue },
		success:function(data){
			userData = data;
			$('#rem').html(userData.Remarks);
			$('#avai').val(userData.Available);
		}
	});
}
</script>
        </form>
       
    </body>
</html>
<?php
if(isset($_POST['sub1']))
{
    echo("<script>document.getElementById('fora').;</script>");
   if($_POST['ew']=="Select One")
   {
       echo("Please select 1");
   }
   else{
       include 'config.php';
       $name=$_POST['ew'];
       $querr="Select * from item where Name='$name'" ;
       $datai=mysqli_query($conn,$querr);
       while($ress=mysqli_fetch_assoc($datai))
       {
           $cx=$ress['Remarks'];
           $cxa=$ress['Name'];
       }
       echo("<script>document.getElementById('i5').value='$cx'</script>");
       
   }
}
?>