<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<style type="text/css">
	html{
		font-size: 10px;
	}
	.swal-text{
		font-size: 2rem;
		font-weight: bold;
	}
</style>
</head>
<body>
<?php
if(isset($_POST['sub1']))
{
$file = $_FILES['csvfile'];
$filename = $file['name'];
$ext = explode(".",$filename);
$extension = $ext[1];
if($extension=="csv")
{
include 'config.php';
$file1 = fopen($filename,'r');
$flag=1;
$lastsend = "";
date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');
$lastupdate = "";
$squery = "select * from item limit 1";
$ssql = mysqli_query($conn,$squery);
$total = mysqli_num_rows($ssql);
if($total!=0)
{
while($row = mysqli_fetch_assoc($ssql))
{
	$lastsend = $row['LastSend'];
	$lastupdate = $row['LastUpdate'];
}
}
else{
	$lastsend=$date;
	$lastupdate=$date;
}
while(($row=fgetcsv($file1,10000,","))!==false)
{
    $id = mysqli_real_escape_string($conn,$row[0]);
	$iname = mysqli_real_escape_string($conn,$row[1]);
	$qty = mysqli_real_escape_string($conn,$row[2]);
	$price = mysqli_real_escape_string($conn,$row[3]);
    $discount = mysqli_real_escape_string($conn,$row[4]);
    $amt = mysqli_real_escape_string($conn,$row[5]);
    $remarks = mysqli_real_escape_string($conn,$row[6]);
    $ud = mysqli_real_escape_string($conn,$row[7]);
    $up = mysqli_real_escape_string($conn,$row[8]);
    $lt = mysqli_real_escape_string($conn,$row[9]);
	$query="Insert into item values('$id','$iname','$qty','$price','$discount','$amt','$remarks', '$ud','$up','$lastsend','$lastupdate','$lt')";
	$sql = $conn->query($query);
	if($sql)
	{
		$flag=0;
	}
	else{
		$flag=1;
		break;
	}
}
if($flag==0)
{
	echo("<script>swal({ icon: 'success' , text: 'Data Inserted Successfully' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change1.php'}});</script>");
}
else{
	echo("<script>swal({ icon: 'error' , text: 'Data Insertion Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change1.php'}});</script>");
}
}
else{
	echo("<script>swal({ icon: 'error' , text: 'Please choose CSV File' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change1.php'}});</script>");
}
}
else{
	header("Location:change1.php");
}
?>
</body>
</html>