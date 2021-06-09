<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
  <?php
  session_start();
   $rand=rand();
   echo($rand);
   $_SESSION['rand']=$rand;
   echo("<br>".$_SESSION['rand']);
  ?>
 <input type="text" value="<?php echo $rand; ?>" name="randcheck" />
   Your Form's Other Field 
 <input type="submit" name="submitbtn" value="submit" />
</form>
<?php
if(isset($_POST['submitbtn']) && $_POST['randcheck']==$_SESSION['rand'])
{
    echo("pre");
}
?>
</body>
</html>