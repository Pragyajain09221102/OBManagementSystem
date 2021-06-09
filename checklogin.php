<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/Autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
     </style>
</head>
<body>
<?php
if(isset($_POST['sub']))
{
    include 'config.php';
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $orignalpass = "";
    $status = "";
    $id = "";
    $logstat = "";
    $mac = exec('getmac');
    $mac = strtok($mac , ' ');
    $query = "Select * from usercust where user_email='$email'";
    $sql = mysqli_query($conn , $query);
    $tot = mysqli_num_rows($sql);
    if($tot==1)
    {
        while($res = mysqli_fetch_assoc($sql))
        {
            $id = $res['users_id'];
            $orignalpass = $res['password'];
            $status = $res['status'];
            $logstat = $res['logstat'];
        }
        if(password_verify($password,$orignalpass))
        {
            if($status=="active")
            {
                //to check whether there are more than 1 user logged in to same device
            $query1 = "select * from usercust inner join mac on usercust.users_id=mac.users_id where mac_addr='$mac' and logstat='loggedin' ";
            $sql1 = mysqli_query($conn,$query1);
            $total = mysqli_num_rows($sql1);
            if($total==0)
            {
                $query4 = "update usercust set logstat='loggedin' where users_id='$id'";
                $sql4 = mysqli_query($conn,$query4);
                header("Location:home.php");
            }
            else if($total>0)
            {
                $logedid = '';
                while($rows = mysqli_fetch_assoc($sql1))
                {
                    $logedid = $rows['users_id'];
                    $query2 = "update usercust set logstat='loggedout' where users_id='$logedid'";
                    $sql2 = mysqli_query($conn,$query2);
                    if($sql2)
                    {
                        $query3 = "update usercust set logstat='loggedin' where users_id='$id'";
                        $sql3 = mysqli_query($conn,$query3);
                        header("Location:home.php");
                    }
                }
            }
            }
            else
            {
                $query5 = "delete from usercust where user_email='$email'";
                $query6 = "delete from mac where users_id='$id'";
                $sql6 = mysqli_query($conn,$query6);
                $deletequery = "drop database ".$id;
                $sql5 = mysqli_query($conn,$query5);
                if($sql5)
                {
                    echo("<script>swal({ icon: 'error' , text: 'Email Not Found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='index.php'}});</script>");        
                }
            }
        }
        else{
            echo("<script>swal({ icon: 'error' , text: 'Invalid Password' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='index.php'}});</script>");
        }
    }
    else
    {
        echo("<script>swal({ icon: 'error' , text: 'Email Not Found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='index.php'}});</script>");
    }
}
?>
</body>
</html>