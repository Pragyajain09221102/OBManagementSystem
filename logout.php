<?php
if(isset($_GET['val']))
{
    include 'config.php';
    $uid = '';
    $query1 = "select * from usercust inner join mac on usercust.users_id=mac.users_id where mac_addr='$mac' and logstat='loggedin' ";
    $sql1 = mysqli_query($conn,$query1);
    while($res = mysqli_fetch_assoc($sql1))
    {
        $uid = $res['users_id'];
    }
    $query2 = "update usercust set logstat='loggedout' where users_id='$uid'";
    $sql2 = mysqli_query($conn,$query2);
    if($sql2)
    {
        header("Location:index.php");
    }
}
else{
    header("Location:index.php");
}
?>