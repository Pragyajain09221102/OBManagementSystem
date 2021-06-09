<!-- HTML PART -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Sweetalert cdn -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- Styling sweetalert -->
	<style>
           .swal-text{
               font-size:18px;
               font-weight:bold;
           }
     </style>
</head>
<body>
<?php
if(isset($_GET['token']))
{
    include 'config.php';
    $id = $_GET['i'];
    $token = $_GET['token'];
    $sendtime = $_GET['t'];
    $date = '';
    $status = '';
    $newtime = time();
    $click = 0 ;
    $query = "Select * from usercust where users_id='$id' and token='$token'";
    $sql = mysqli_query($conn,$query);
    $tot = mysqli_num_rows($sql);
    $today = date("Y-m-d");
    if($tot==1)
    {
        while($res = mysqli_fetch_assoc($sql))
        {
            $date = $res['register_date'];
            $status = $res['status'];
            $click = $res['click'];
        }
        if($status=='inactive' && $click==0)
        {
            if(($newtime-$sendtime)<=300 && $today==$date)
            {
                $query1 = "update usercust set status='active' , click=1 where users_id='$id'";
                $sql1 = mysqli_query($conn,$query1);
                if($sql1)
                {
                    $createquery = "create database ".$id;
                    $sqlquery = mysqli_query($conn,$createquery);
                    if($sqlquery)
                    {
                        echo("<script>swal({ icon: 'success' , text: 'Your account has been activated' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='index.php'}});</script>");
                    }
                }
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Link is expired' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
            }
        }
        else if($status=='inactive' && $click==1)
        {
            echo("<script>swal({ icon: 'error' , text: 'Link is expired' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
        }
        else if($status=='active' && $click==1)
        {
            echo("<script>swal({ icon: 'error' , text: 'Your account is already activated' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
        }
    }
    else{
        echo("<script>swal({ icon: 'error' , text: 'Data not found' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
    }
}
?>
</body>
</html>