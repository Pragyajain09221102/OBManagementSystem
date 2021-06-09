<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	.container{
		border: 2px solid black;
		height: 100%;
		width: 100%;
		position:absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%,-50%);
	}
	.in1{
		width: 275px;
		margin-top: 20px;
	}
	.table{
		font-size:20px;
		font-weight: bold;
	}
	.btn{
	font-size:20px;
		font-weight: bold;	
	}
        #loader{
               position: fixed;
               overflow: hidden;
               width: 100%;
               height:100vh;
               background:#fff url('images/Spinner-1s-200px.gif')no-repeat center;
               z-index:99999;
           }
</style>
<script type="text/javascript">
	function fn1(){
        var a = document.getElementById("in1").value;
        var b = document.getElementById("in2").value;
        var c = document.getElementById("in3").value;
        if(a=="" || b=="" || c=="")
        {
            alert("Something is wrong");
        }
        else{
		document.getElementById("f1").action="second.php" ;
	}
    }   
</script>
</head>
    <body onload="load()">
        <div id="loader"></div>

	<div class="container">
		<form id="f1" method="POST">
		Create File : <input  type="text" name="in1" class="in1" autocomplete="on" autofocus="on" id="in1"><br><br>
		<input type="submit" name="sub3" value="SII">
                <?php if(isset($_POST['sub3'])){ $file=$_POST['in1']; ?>
                <table class="table table-bordered table-striped table-hover">
			<tr class="text-center text-white bg-dark">
				<td colspan="2">Enter Details</td>
			</tr>
                        <tr class="text-center">
            <td>File name</td>
            <td><input type="text" name="in4" value="<?php echo $file; ?>" autocomplete="on" autofocus="on" id="in2"></td>
			</tr>
			<tr class="text-center">
            <td>Enter your first name</td>
            <td><input type="text" name="in2" autocomplete="on" autofocus="on" id="in2"></td>
			</tr>
			<tr class="text-center">
            <td>Enter your last name</td>
            <td><input type="text" name="in3" autocomplete="on" id="in3"></td>
			</tr>
			<tr class="text-center">
            <td colspan="2"><input class="btn-primary btn" type="submit" name="sub" value="Click Me" onclick="fn1()">
            <input class="btn-primary btn" type="submit" name="sub1" value="SEE">
            </td>
			</tr>
		</table>
                <?php } ?>
	</form>
<?php
include 'config.php';
if(isset($_POST['sub1']))
{
	$a = $_POST['in4'];
	$b = $_POST['in2'];
	$c = $_POST['in3'];
	$query = "Create table $a(`First Name` varchar(30) Not Null Unique , `Last Name` varchar(30) Not Null)" ;
	$data = mysqli_query($conn , $query);
	if($data)
	{
		$query1 = "Insert into $a values('$b' , '$c')" ;
		$data1 = mysqli_query($conn , $query1);
		
		if(!$data1){
			echo("<script>alert('Something is wrong'); window.location.href='create.php'</script>");
		}
	}
	else{
		$query3 = "Insert into $a values('$b' , '$c')" ;
		$data3 = mysqli_query($conn , $query3);
		
		if(!$data3){
			echo("<script>alert('Something is wrong');window.location.href='create.php'</script>");
		}
	}
        
}
?>
                <?php
include 'config.php';
if(isset($_POST['sub1']))
{
	$a = $_POST['in4'];
	$b = $_POST['in2'];
	$c = $_POST['in3'];
	
        $quer = "select * from $a" ;
        $dae = mysqli_query($conn,$quer);
        $tot1 = mysqli_num_rows($dae);
        if($tot1!=0)
        {
            ?>
            <table class="table table-bordered table-striped table-hover">
                <tr class="text-center text-white bg-dark">
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                <tr class="text-center">
            <?php
            while($result = mysqli_fetch_assoc($dae))
            {
                ?>
                    <td class="text-center"><?php echo $result['First Name']; ?></td>
                    <td class="text-center"><?php echo $result['Last Name']; ?></td>
                </tr>
                    <?php
            }
        }
}
?>
            </table>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>