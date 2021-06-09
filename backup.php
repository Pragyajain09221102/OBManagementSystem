<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
        
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
       </style>

    </head>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/Autoload.php';
include 'config.php';
$connected = @fsockopen("www.google.com", 80);
if($connected)
{
$query = "Select * from item ";
$sql=mysqli_query($conn,$query);
$data=array();
while($row=mysqli_fetch_assoc($sql))
{ 
  $subdata=array();
    $subdata[]=$row['Id']; //id
    $subdata[]=$row['Name']; //name
    $subdata[]=$row['Available']; //salary
    $subdata[]=$row['List Price']; //age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]=$row['Discount'];
    $subdata[]=$row['Amount'];
    $subdata[]=$row['Remarks'];
  $subdata[]=$row['UpdatedDiscount'];
  $subdata[]=$row['UpdatedPrice'];
  $subdata[]=$row['LastSend'];
  $subdata[]=$row['LastUpdate'];
  $subdata[]=$row['LessThanQty'];
  $data[]=$subdata;
}
$query1 ="CREATE TABLE `item` (
  `Id` bigint NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Available` varchar(500) NOT NULL,
  `List Price` decimal(65,2) DEFAULT NULL,
  `Discount` varchar(400) NOT NULL,
  `Amount` varchar(5000) NOT NULL,
  `Remarks` varchar(6000) NOT NULL,
  `UpdatedDiscount` varchar(1000) NOT NULL,
  `UpdatedPrice` varchar(1000) NOT NULL,
  `LastSend` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LessThanQty` bigint NOT NULL DEFAULT '5',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

";
$fil=fopen("data.csv","w");  
foreach ($data as $line) {
  fputcsv($fil, $line);
}

fclose($fil);
$fil1=fopen("create.sql","w");
fwrite($fil1,$query1);
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
$time=date('H:i:s');
$qu="Select * from item limit 1";
   $sq=mysqli_query($conn,$qu);
   while($rs=mysqli_fetch_assoc($sq))
   {
     $dat=($rs['LastUpdate']);
   }
   $date1=explode(' ',$dat)[0];
   
   $time1=explode(' ',$dat)[1];
   
   
   $sel="Select Id,LastSend from item limit 1 ";
   $sqq=mysqli_query($conn,$sel);
   while($ras=mysqli_fetch_assoc($sqq))
   {
     $emailsend=$ras['LastSend'];
   }
   $sendate=explode(' ',$emailsend)[0];
   $sendtime=explode(' ',$emailsend)[1];
   if($time1>$sendtime)
{
$mbody=date('Y-m-d H:i:s');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPSecure = "ssl";
$mail->Port = 465; 
$mail->SMTPAuth = true;
$mail->Username = "fitness.ease.official@gmail.com";             
$mail->Password = "ASpjas09221102";
$mail->setFrom('fitness.ease.official@gmail.com','FitnessEase');
$mail->addAddress('omegabearings@gmail.com');
$mail->addAddress('cheekuj5@gmail.com'); 
$mail->addAttachment("data.csv");
$mail->addAttachment("create.sql");
$mail->isHTML(true);
$mail->Subject = "Data";
$mail->Body =$mbody;
if($mail->send())
{
  $up="UPDATE item set LastSend='$mbody'";
  $sqlp = mysqli_query($conn,$up);
}
}
else if($time1<$sendtime && $date1>$sendate)
{
  $mbody=date('Y-m-d H:i:s');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPSecure = "ssl";
$mail->Port = 465; 
$mail->SMTPAuth = true;
$mail->Username = "fitness.ease.official@gmail.com";             
$mail->Password = "ASpjas09221102";
$mail->setFrom('fitness.ease.official@gmail.com','FitnessEase');
$mail->addAddress('omegabearings@gmail.com');
$mail->addAddress('cheekuj5@gmail.com'); 
$mail->addAttachment("data.csv");
$mail->addAttachment("create.sql");
$mail->isHTML(true);
$mail->Subject = "Data";
$mail->Body = $mbody;
if($mail->send())
{
  $up="UPDATE item set LastSend='$mbody'";
  $sqlp = mysqli_query($conn,$up);
}
}
}
?>