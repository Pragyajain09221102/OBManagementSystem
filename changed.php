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
while(($row=fgetcsv($file1,10000,","))!==false)
{
	$iname = $row[0];
	$prices = $row[1];
	$remarks = $row[2];
	$query="Update item set `List Price`='$prices' , Remarks='$remarks' where Name='$iname'";
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
	echo("<script>swal({ icon: 'success' , text: 'Data Updated Successfully' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});</script>");
}
else{
	echo("<script>swal({ icon: 'error' , text: 'Data Updatation Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});</script>");
}
}
else{
	echo("<script>swal({ icon: 'error' , text: 'Please choose CSV File' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});</script>");
}
}
else{
	header("Location:change.php");
}
?>
</body>
</html>