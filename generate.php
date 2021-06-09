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
$query="Show Tables" ;
    $da=mysqli_query($con,$query);
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

<link rel="stylesheet" href="generate.css" />
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
<script>
    
     function f()
            {
                swal({ icon: 'info' , text: 'Are you Sure, you want to cancel!' , buttons:{confirm:'No' , cancel:'Yes'}}).then(val => {if(val){window.location.href='generate.php'}else{window.location.href='cancel.php'}}); 
       
            }
            
           function ack()
           {
               window.location.href="brand.php";
           }
           function ack1()
           {
               document.getElementById("fora").action="bill1.php";
           }
             function cack1()
            {
                window.location.href="generate.php";
            }                                                                                                                  
       function fn1()
       {
           
           var e = document.getElementById("i4").value;
            var f = document.getElementById("i3").value;
           if(f!=0 || e!=0)
           {
               document.getElementById("fora").action="check.php";
               return true ;
           }
           else{
              alert("Something went wrong");
               return false;
           }
       }
       
       function fnn(event)
       {
           event.preventDefault();
          var x = event.which || event.keycode;
          
          if(x==13)
          {
              
              document.getElementById('i3').focus();
          }
       }
       
       function nv(){
           alert("DISIIS");
       }
       function gn()
       {
         var b = document.getElementById("i4").value ;
          if(b!=0)
          {
              document.getElementById("i3").style.backgroundColor="gainsboro";
              document.getElementById("i3").value="0";
              document.getElementById("i3").readOnly=true;
          }
          else{
              document.getElementById("i3").style.backgroundColor="white";
              document.getElementById("i3").readOnly=false;
          }
       }
       function gn1()
       {
         var b = document.getElementById("i3").value ;
          if(b!=0)
          {
              document.getElementById("i4").style.backgroundColor="gainsboro";
              document.getElementById("i4").value="0";
              document.getElementById("i4").readOnly=true;
            
          }
          else{
              document.getElementById("i4").style.backgroundColor="white";
              document.getElementById("i4").readOnly=false;
          }
       }
      function gn2()
       {
         var b = document.getElementById("i4").value ;
          if(b!=0)
          {
              document.getElementById("i3").style.backgroundColor="gainsboro";
              document.getElementById("i3").value="0";
              document.getElementById("i3").readOnly=true;
          }
          else{
              document.getElementById("i3").style.backgroundColor="white";
              document.getElementById("i4").value="0";
              document.getElementById("i3").readOnly=false;
          }
       }
       function gn3()
       {
         var b = document.getElementById("i3").value ;
          if(b!=0)
          {
              document.getElementById("i4").style.backgroundColor="gainsboro";
              document.getElementById("i4").value="0";
              document.getElementById("i4").readOnly=true;
            
          }
          else{
              document.getElementById("i4").style.backgroundColor="white";
              document.getElementById("i3").value="0";
              document.getElementById("i4").readOnly=false;
          }
       }

</script>
<script type="text/javascript">
  window.onbeforeunload=function()
  {
    $.ajax({
    url:'backup.php',
    type:'POST'
    });
  } 
</script>
    </head>
    <body onload="load()">
        <div id="loader"></div>
        <form name="form"  method="POST" id="fora" autocomplete="off">
            <div class="container">
                <br>       
                <table class="table table-striped table-hover table-bordered" style="width:100%">
                <tr class="bg-primary text-center text-white"><td colspan="4" style="font-size:32px"><center>Generate Quotation</center></td></tr>
                 <tr style="font-weight: bolder; ">
                        <th colspan="2">Create New Quotation : <input type="text" autocomplete="off" name="bill" value="<?php if(isset($_POST['bill'])){$dv=$_POST['bill']; echo($dv);} else if(isset($_GET['id'])){$tb = $_GET['id']; echo $tb;} ?>"></th>
                           <th colspan="2">Quotation Opened : <select id="dem" style="min-width:200px">
            <?php echo $options1 ; ?>
        </select></th>
                 </tr>
                <tr class="text-center" style="font-weight: bolder; ">
                        <th>Item Name</th>
                        <td class="text-center"><select class="form-control select2" id="sel" name="item"  onchange="myfun(this.value)">
             <option class="o1" >Select One</option>
            <?php echo $options ; ?>
        </select>
                </td>
                <th>Quantity</th>
                <td><input type="number" pattern=[0-9]{1} title="Only Numbers"   min="0" step="0.01" name = "quantity" id="i2"></td>
                    </tr>
                 <tr class="text-center" style="font-weight: bolder; ">
                     <th>Price</th>   
             <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0" min="0.0" step="0.01" name = "price" id="i4"  oninput="gn()" onfocusout="gn2()"></td>
             <th>Discount</th>
             <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0" min="0.0" max="100" step="0.01" name = "discount" id="i3"  oninput="gn1()" onfocusout="gn3()" style="width:245px"></td>
                 </tr>
             <tr class="text-center" style="font-weight: bolder; "> 
                 <th>Remarks</th>
                 <td><center><p id="rem" style="border:2px solid black;max-width:70%">Nothing</p></center></td>
             <th>Available</th>           
             <td><input type="text" id="avai" readonly="readonly" value="0"></td>
             </tr>
               <tr class="text-center" style="font-weight: bolder; ">
                     <th>List Price</th>   
             <td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0" min="0.0" step="0.01" name = "uprice" id="i10"></td>
             <th colspan="2"></th>
                 </tr>
             <tr class="text-center" style="font-weight: bolder; "> 
                 <td colspan="4"><button type="button" class="btn-danger btn" onclick="ack()">Back</button> 
                 <input type="submit" class="btn-success btn" value="Add" name="sub">
                </td>
                 </tr>
                </table>
            <script>
                     $('.select2').select2({
                         dropupAuto:false ,
                     });
            </script>
                     <script>
                     $('#dem').select2({
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
                        $('#i10').val(userData['List Price']);
                        $('#i4').val(userData.UpdatedPrice);
                        $('#i3').val(userData.UpdatedDiscount);
		}
	});
}
</script>
        </form>
        <script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>

<?php
if(isset($_POST['sub']))
{
    $tb = $_POST['bill'];
    $tb1 = $_POST['price'];
    $tb2 = $_POST['discount'];
    $tb3 = $_POST['item'];
    $tb4 = $_POST['quantity'];
    include 'config.php';
    if($tb!="" && $tb3!="Select One" && $tb4!="" && ($tb1>0 xor $tb2>0))
    {
    $bi = $_POST['bill'];
    $first="Create table $bi(Id bigint(100) Not Null Unique , Item varchar(500) NOT NULL Unique , Qty varchar(30) NOT NULL, `List Price` varchar(30) NOT NULL , Discount varchar(10) NOT NULL , Price varchar(30) NOT NULL , Amount varchar(30) NOT NULL, Remarks varchar(6000) NOT NULL , QD date NULL)";
    $first_q = mysqli_query($con,$first);
    $b = $_POST['item'];
    $e = $_POST['quantity'];
    $z = $_POST['price'];
    $s=$_POST['discount'];
    $qd=date('Y/m/d');
    if($z=="" || $z==0)
    {
        $queer = "Select UpdatedPrice,UpdatedDiscount from item where id='$b'";
        $ddata = mysqli_query($conn,$queer);
        while($roows = mysqli_fetch_assoc($ddata))
        {
            $uup = $roows['UpdatedPrice'];
            $uud = $roows['UpdatedDiscount'];
        }
        if($uup==0 && $uud==0)
        {
           date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
            $upquery = "update item set UpdatedDiscount='$s' where id='$b'";
        $sql = mysqli_query($conn,$upquery);
        }
        else if($uup>0 && $uud>0)
        {
            date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
            $upquery = "update item set UpdatedDiscount='0' , UpdatedPrice='0' where id='$b'";
        $sql = mysqli_query($conn,$upquery);
        }
        $query="Select * from item where id='$b'";
        $data=mysqli_query($conn,$query);
        while($result=mysqli_fetch_assoc($data))
        {
            $case=$result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amt=(float)$s/100;
            $amt1=$c*(1-$amt);
            $amt4=round($amt1,2);
            $amt2=$amt1*$e;
            $amt3=round($amt2,2);
            $query1="Insert into $bi values('$b','$case','$e','$c','$s','$amt4','$amt3','$d','$qd')";
            $data1=mysqli_query($con,$query1);
            if($data1)
            {
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
    else{
        $updquery = "Select UpdatedDiscount,UpdatedPrice from item where id = '$b'" ;
        $ssql = mysqli_query($conn,$updquery);
        while($rowws=mysqli_fetch_assoc($ssql))
        {
            $ud = $rowws['UpdatedDiscount'];
            $up = $rowws['UpdatedPrice'];
        }
        if($ud==0 && $up==0)
        {
           date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
            $updatequery="Update item set UpdatedPrice='$z' where id='$b'" ;
        $sql1 = mysqli_query($conn,$updatequery);
        }
        else if($ud>0 && $up>0)
        {
            date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
            $updatequery="Update item set UpdatedPrice='0' , UpdatedDiscount='0' where id='$b'" ;
        $sql1 = mysqli_query($conn,$updatequery);
        }
        $query3="Select * from item where id='$b'";
        $data3=mysqli_query($conn,$query3);
        while($result=mysqli_fetch_assoc($data3))
        {
            $case=$result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amtt=(float)($c-$z)*100;
            $amtt1=(float)$amtt/$c;
            $amtt2=(float)$e*$z;
            $amtt3=round($amtt1,2);
            $amtt4=round($amtt2,2);
            $query1="Insert into $bi values('$b','$case','$e','$c','$amtt3','$z','$amtt4','$d','$qd')";
            $data1=mysqli_query($con,$query1);
            if($data1)
            {
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
$quer="SELECT * FROM $bi";
$daa=mysqli_query($con , $quer);
$stot=mysqli_num_rows($daa);
$id=1;
if($stot!=0)
{
?>
<table  class="table table-striped table-hover table-bordered" >
    <tr class="bg-dark text-white text-center">
        <td colspan="10" style="font-size:23px;font-weight:Bold"><?php echo $bi;  ?></td>
    </tr>
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
while($result=mysqli_fetch_assoc($daa)){
?>
    <td class='text-center'><?php echo($id); ?> </td>
<td class='text-center'><?php echo($result['Item']); ?> </td>
<td class='text-center'><?php echo($result['Qty']); ?></td>
<td class='text-center'><?php echo($result['List Price']); ?></td>
    <td class='text-center'><?php echo($result['Discount']); ?></td>
        <td class='text-center'><?php echo($result['Price']); ?></td>
            <td class='text-center'><?php echo($result['Amount']); ?></td>
<td class='text-center'><?php echo($result['Remarks']); ?></td>

    <td class="text-center"><button class="btn-danger btn text-center"><a id="a1" class="text-center text-white" href='delete.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $bi; ?>'>Delete</a></button>
    <td class="text-center"><button class="btn-success btn text-center"><a id="a1" class="text-center text-white" href='update.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $result['Price']; ?>&id2=<?php echo $result['Qty']; ?>&id3=<?php echo $bi; ?>'>Update</a></button>
    </td></tr>

<?php
$id++;
}
?>
<tr class="text-center">
    <td colspan="10"><button class="btn-danger btn text-center" style="font-weight:bolder;font-size:23px ; width:110px" onclick="this.disabled=true;"><a id="a1" class="text-center text-white" href='cancel.php?id1=<?php echo $bi; ?>'>Cancel</a></button> 
              <button class="btn-success btn text-center" style="font-weight:bolder;font-size:23px ; width:110px"><a id="a1" class="text-center text-white" href='bill.php?id1=<?php echo $bi; ?>'>Bill</a></button></td>
</tr>
<?php
}
    }
    else if($_POST['bill']!="" && $_POST['item']=="Select One" && $_POST['quantity']=="" && $_POST['price']=="0" && $_POST['discount']=="0")
    {
        $fi=$_POST['bill'];
     $quer="SELECT * FROM $fi";
$daa=mysqli_query($con , $quer);
$stot=mysqli_num_rows($daa);
$id=1;
if($stot!=0)
{
?>
<table  class="table table-striped table-hover table-bordered" >
    <tr class="bg-dark text-white text-center">
        <td colspan="10" style="font-size:23px;font-weight:Bold"><?php echo $fi;  ?></td>
    </tr>
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
while($result=mysqli_fetch_assoc($daa)){
?>
    <td class='text-center'><?php echo($id); ?> </td>
<td class='text-center'><?php echo($result['Item']); ?> </td>
<td class='text-center'><?php echo($result['Qty']); ?></td>
<td class='text-center'><?php echo($result['List Price']); ?></td>
    <td class='text-center'><?php echo($result['Discount']); ?></td>
        <td class='text-center'><?php echo($result['Price']); ?></td>
            <td class='text-center'><?php echo($result['Amount']); ?></td>
<td class='text-center'><?php echo($result['Remarks']); ?></td>

    <td class="text-center"><button class="btn-danger btn text-center"><a id="a1" class="text-center text-white" href='delete.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $fi; ?>'>Delete</a></button>
    <td class="text-center"><button class="btn-success btn text-center"><a id="a1" class="text-center text-white" href='update.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $result['Price']; ?>&id2=<?php echo $result['Qty']; ?>&id3=<?php echo $fi; ?>'>Update</a></button>
    </td></tr>

<?php
$id++;
}
?>
<tr class="text-center">
    <td colspan="10"><button class="btn-danger btn text-center" style="font-weight:bolder;font-size:23px ; width:110px"><a id="a1" class="text-center text-white" href='cancel.php?id1=<?php echo $fi; ?>'>Cancel</a></button> 
                     <button class="btn-success btn text-center" style="font-weight:bolder;font-size:23px ; width:110px"><a id="a1" class="text-center text-white" href='bill.php?id1=<?php echo $fi; ?>'>Bill</a></button></td>
</tr>
<?php
}  
else{
                   echo("<script>swal({ icon: 'error' , text: 'No records found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='generate.php'}});</script>");
}
    }
    else{
                echo("<script>swal({ icon: 'error' , text: 'Something Went Wrong' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>"); 
    }
}
else if(isset($_GET['id']))
{
    include 'config.php';
    $fi=$_GET['id'];
     $quer="SELECT * FROM $fi";
$daa=mysqli_query($con , $quer);
$stot=mysqli_num_rows($daa);
$id=1;
if($stot!=0)
{
?>
<table  class="table table-striped table-hover table-bordered" >
    <tr class="bg-dark text-white text-center">
        <td colspan="10" style="font-size:23px;font-weight:Bold"><?php echo $fi;  ?></td>
    </tr>
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
while($result=mysqli_fetch_assoc($daa)){
?>
    <td class='text-center'><?php echo($id); ?> </td>
<td class='text-center'><?php echo($result['Item']); ?> </td>
<td class='text-center'><?php echo($result['Qty']); ?></td>
<td class='text-center'><?php echo($result['List Price']); ?></td>
    <td class='text-center'><?php echo($result['Discount']); ?></td>
        <td class='text-center'><?php echo($result['Price']); ?></td>
            <td class='text-center'><?php echo($result['Amount']); ?></td>
<td class='text-center'><?php echo($result['Remarks']); ?></td>

    <td class="text-center"><button class="btn-danger btn text-center"><a id="a1" class="text-center text-white" href='delete.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $fi; ?>'>Delete</a></button>
    <td class="text-center"><button class="btn-success btn text-center"><a id="a1" class="text-center text-white" href='update.php?id=<?php echo $result['Id']; ?>&id1=<?php echo $result['Price']; ?>&id2=<?php echo $result['Qty']; ?>&id3=<?php echo $fi; ?>'>Update</a></button>
    </td></tr>

<?php
$id++;
}
?>
<tr class="text-center">
    <td colspan="10"><button class="btn-danger btn text-center" style="font-weight:bolder;font-size:23px ; width:110px"><a id="a1" class="text-center text-white" href='cancel.php?id1=<?php echo $fi; ?>'>Cancel</a></button> 
                     <button class="btn-success btn text-center" style="font-weight:bolder;font-size:23px ; width:110px"><a id="a1" class="text-center text-white" href='bill.php?id1=<?php echo $fi; ?>'>Bill</a></button></td>
</tr>
<?php
}  
else{
                   echo("<script>swal({ icon: 'error' , text: 'No records found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='generate.php'}});</script>");
}
}
?>
</table></div>