<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/Autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
 $mail->SMTPDebug = true;
$mail->Host='smtp.gmail.com';
$mail->SMTPSecure = 'ssl';

$mail->Port =465; 
$mail->SMTPAuth = true;
$mail->Username = "fitness.ease.official@gmail.com";             
$mail->Password = "ASpjas09221102";
$mail->setFrom('fitness.ease.official@gmail.com','FitnessEase');
$mail->addAddress('omegabearings@gmail.com');
$mail->addAddress('cheekuj5@gmail.com'); 
$mail->isHTML(true);
$mail->Subject = "bata";
$mail->Body ="dddd";
if($mail->send())
{
echo("SEBD");
}
else{
echo("not send");
}
?>