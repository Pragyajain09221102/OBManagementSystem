<?php
include 'config.php';
if(isset($_POST['sub']))
{
	$a = $_POST['in1'];
	$b = $_POST['in2'];
	$c = $_POST['in3'];
	$query = "Create table $a(`First Name` varchar(30) Not Null , `Last Name` varchar(30) Not Null)" ;
	$data = mysqli_query($conn , $query);
	if($data)
	{
		$query1 = "Insert into $a values('$b' , '$c')" ;
		$data1 = mysqli_query($conn , $query1);
		if($data1)
		{
			echo("<script>window.location.href='create.php'</script>");
		}
		else{
			echo("<script>alert('Something is wrong'); window.location.href='create.php'</script>");
		}
	}
	else{
		$query3 = "Insert into $a values('$b' , '$c')" ;
		$data3 = mysqli_query($conn , $query3);
		if($data3)
		{
		echo("<script>window.location.href='create.php'</script>");	
		}
		else{
			echo("<script>alert('Something is wrong');window.location.href='create.php'</script>");
		}
	}
}
?>