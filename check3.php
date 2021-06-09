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
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src='sweetalert/dist/sweetalert.min.js'></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src='sweetalert/dist/sweetalert.min.js'></script>
    </head>
<body onload="load()">
        <div id="loader"></div>
    <?php
include 'config.php';
$a=$_POST['item'];

$b=$_POST['quantity'];

$c=$_POST['lprice'];

$d=$_POST['discount'];

$e=$_POST['remarks'];

if($conn)
{ 
        
    $query1="Select * from item where Name='$a'" ;
    $da1=mysqli_query($conn,$query1);
    $tot=mysqli_num_rows($da1);
    
    if($tot!=0)
    {
    echo("<script>swal({ icon: 'error' , text: 'Item is already available' , buttons:{confirm:'Back'}}).then(val => {if(val){window.location.href='addnew.php'}}); </script>");            
    }
    else
    {
    $query="Select Id from item Order By id Desc limit 1" ;
    $da=mysqli_query($conn,$query);
    $i=0;
    while($table=mysqli_fetch_assoc($da))
            
    {
        $i = $table['Id'];
        
    }
    
    $aci= $i+1;
   
    $amt=$b*$c;
    $amt1=(float)$d/100;
    $amt2=(float)$amt*$amt1;
    $amt3=$amt-$amt2;
    $amt4=round($amt3,2);
    $lt = 5;
    date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
    $query2="Insert into item values('$aci' , '$a' , '$b' , '$c' , '$d' , '$amt4' , '$e','','','$datee','0000-00-00 00:00:00','$lt')";
    $da2=mysqli_query($conn,$query2);
    if($da2)
    {
   echo("<script>swal({ icon: 'success' , text: 'Item Added Successfully' , buttons:{confirm:'Ok' , cancel:'Back'}}).then(val => {if(val){window.location.href='addnew.php'}else{window.location.href='addnew.php'}}); </script>");                 
    }
    else{
        echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Back'}}).then(val => {if(val){window.location.href='addnew.php'}}); </script>");           
    }
    }
    if($b<=5)
    {
        $quer="Insert into outofstock values('$a' , '$b')";
        $daerr=mysqli_query($conn,$quer);
    }
}
else{
    echo("<script>swal({ icon: 'error' , text: 'Invalid credentials, Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
?>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
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
    </body>
</html>