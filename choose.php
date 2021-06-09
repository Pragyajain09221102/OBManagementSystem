<?php

$link = mysqli_connect("localhost", "root", "ASpjas09221102","mydb");
$user = $_POST['user'];    
$query = "select age,email from del where name='$user'";
$sql = mysqli_query($link, $query);

$row = mysqli_fetch_array($sql);
echo json_encode($row);die;
?>