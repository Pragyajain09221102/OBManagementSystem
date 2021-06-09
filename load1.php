<?php
include 'config.php';
$request=$_REQUEST;
$col =array(
    0   =>  'Id',
    1   =>  'Name',
    2   =>  'Available',
    3   =>  'List Price',
    4   =>  'Discount',
    5   =>  'Amount',
    6   =>  'Remarks',
);  //create column like table in database

$sql ="SELECT * FROM item ORDER BY Name ASC";
$query=mysqli_query($conn,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM item WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (Name Like'%".$request['search']['value']."%') ";
}
$query=mysqli_query($conn,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($conn,$sql);

$data=array();
while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //name
    $subdata[]=$row[2]; //salary
    $subdata[]=$row[3]; //age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]=$row[4];
    $subdata[]=$row[5];
    $subdata[]=$row[6];
    $subdata[]= "<a href='update2.php?id=$row[0]'>Edit /</a> <a href='delete2.php?id=$row[1]'>Delete</a>" ;
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);
?>