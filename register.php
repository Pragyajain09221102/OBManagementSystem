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
    $name = $_POST['yrname'];
    $email = $_POST['yremail'];
    $password = $_POST['yrpassword'];
    $password = password_hash($password , PASSWORD_BCRYPT);
    $id = 0;
    $regisdate = date("Y-m-d");
    //retreiving mac address of device
    $mac = exec('getmac');
    $mac = strtok($mac , ' ');
    //Creating 5byte random token
    $token = bin2hex(random_bytes(5));
    $status = 'inactive';
    $idquery = "Select * from usercust order by users_id desc limit 1";
    $idsql = mysqli_query($conn,$idquery);
    $totalrows = mysqli_num_rows($idsql);
    if($totalrows==0)
    {
        $id = 'U001';
    } 
    else{
        while($res = mysqli_fetch_assoc($idsql))
        {
            $id = $res['users_id'];
        }
        $uid = explode("U",$id);
        $uid = $uid[1]+1;
        if($uid<10)
        {
            $id = "U00".$uid;
        }
        else if($uid<100)
        {
            $id = "U0".$uid;
        }
        else{
            $id = "U".$uid;
        }
    }
  $query = "select * from usercust where user_email='$email'";
  $sql = mysqli_query($conn,$query);
  $tot = mysqli_num_rows($sql);
  if($tot>0)
  {
    echo("<script>swal({ icon: 'error' , text: 'Email already exist' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
  }
  else{
      //Insert value to database
      $insertquery = "insert into usercust values('$id','$name','$email','$password','$regisdate','$status','$token',0,'','loggedout','0000-00-00','$id')";
      $insertsql = mysqli_query($conn,$insertquery);
      if($insertsql)
      {
          //inserting to mac table
        $macquery =  "Insert into mac values('$id','$mac')";
        $macsql = mysqli_query($conn,$macquery);
        if($macsql)
        {
            //time when email is send
$ti = time();
//sending email verification link
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPSecure = "ssl";
$mail->Port = 465; 
$mail->SMTPAuth = true;
$mail->Username = "fitness.ease.official@gmail.com";             
$mail->Password = "ASpjas09221102";
$mail->setFrom('fitness.ease.official@gmail.com','FitnessEase');
$mail->addAddress($email);
$mail->isHTML(true);

$mail->Subject = "Account Activation Link";
$mail->Body = "<b>Hi $name</b>. Click the link to activate your account http://localhost/OBManagementSystem/activate.php?token=$token&t=$ti&i=$id";
$mail->AltBody = "This is the plain text version of the email content";
//if email send successfully
if ($mail->send())
             {
    		echo("<script>swal({ icon: 'success' , text: 'An activation link has been send to $email' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php';window.open('registration.php','_self')}});</script>");
			 }	
			 //if email cannot be send
			else
			 {
    			echo("<script>swal({ icon: 'error' , text: 'Email cannot be send' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
			 }
        }
      }
      else{
        echo("<script>swal({ icon: 'error' , text: 'Registration Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='registration.php'}});</script>");
      }
  }  
}
else{
    header("Location:registration.php");
}
?>
</body>
</html>