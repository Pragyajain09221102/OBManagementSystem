<?php
$mac = exec('getmac');
$mac = strtok($mac,' ');
$db1="";
$servername="localhost" ;
$user = "root" ;
$password = "12345" ;
$db = "companydb" ;
$port = 3307;
$conn= mysqli_connect($servername , $user , $password , $db , $port);
if(!$conn)
{
header("Location:index.php");
}
$query="select * from usercust inner join mac on usercust.users_id=mac.users_id where mac_addr='$mac' and logstat='loggedin'";
$sql = mysqli_query($conn,$query);
while($res = mysqli_fetch_assoc($sql))
{
    $db1 = $res['UDB'];
}
$servername1="localhost" ;
$user1 = "root" ;
$password1 = "12345" ;
$port1 = 3307;
$con= mysqli_connect($servername1 , $user1 , $password1 , $db1 , $port1);
if(!$con)
{
    header("Location:index.php");
}
?>
