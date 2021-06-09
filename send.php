<?php
$servername = "localhost";
$user = "root";
$pass = "12345";
$db = "student";
$port = 3307;
$conn = mysqli_connect($servername,$user,$pass,$db,$port);
if($conn)
{
    $query="select * from studentinformation";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($sql))
    {
        $arr=$row;
    }
    json_encode($arr);
}
?>