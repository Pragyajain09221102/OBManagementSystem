<?php
if(isset($_POST['userid']))
{
include 'config.php';
	$pass = $_POST['newpass'];
	$users_id = $_POST['userid'];
	$newpass  = password_hash($pass, PASSWORD_BCRYPT);
	$query = "Update usercust set password='$newpass' where users_id='$users_id'";
	$sql=$conn->query($query);
	if($sql)
	{
		echo("Updated");
	}
	else{
		echo("Failed");
	}	
}
?>