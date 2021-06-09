<?php
include 'config.php';
$iid = $_POST['item'];    
$query = "select Available,Remarks , `List Price`,UpdatedPrice , UpdatedDiscount from item where Id='$iid'";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
echo json_encode($row);die;
?>