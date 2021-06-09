<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Sweetalert cdn -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- Bootstrap link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Fontawesome link -->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- ajax link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
	*{
		margin:0;
		padding: 0;
		box-sizing: border-box;
	}
	.swal-text{
		font-weight: bold;
		font-size:2rem;
	}
	html{
		font-size: 10px;
	}
	body{
		height:100vh;
		width:100vw;
		display: grid;
		place-items:center;
	}
	.changepass{
		display: grid;
		place-items:center;
		height:60vh;
		width: 55vw;
		background-color: black;
	}
	::placeholder{
		font-weight: bold;
		font-size:2rem;
		text-align: center;
		color: black;
	}
	input{
		font-weight: bold;
		font-size:2rem;
		width:25rem;
		height:5rem;
		text-align: center;
	}
	.btnchange{
	font-weight: bold;
		font-size:2rem;
		width:25rem;
		height:5rem;	
	}
	.btnchangepass{
	font-weight: bold;
		font-size:2rem;
		width:25rem;
		height:5rem;	
	}
</style>
</head>
<body>
<?php
if(isset($_POST['next']))
{
	$userid='';
	$email = $_POST['em'];
	include 'config.php';
	$query  = "select * from usercust where user_email='$email'";
	$sql=mysqli_query($conn,$query);
	$total = mysqli_num_rows($sql);
	if($total==0)
	{
	
		echo("<script>swal({ icon: 'error' , text: 'Email does not exist' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='login.php'}});</script>");
	}
		else{
		while($res = mysqli_fetch_assoc($sql))
		{
			$userid = $res['users_id'];
		}
		?>
		<div class="container-fluid p-0 m-0 changepass">
			<form>
				<table class="table table-borderless">
					<tbody>
						<tr>
							<th>
								<input type="password" placeholder="Enter new Password" id="newpass" name="">
							</th>
						</tr>
	 					<tr>
							<th>
								<input type="password" placeholder="Confirm Password" id="cpass" name="">
							</th>
						</tr>
						<tr>
							<th>
								<button type="button" class="btn btn-warning btnchange">Change Password</button>
							</th>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}
	}
?>
<script type="text/javascript">
	$(".btnchange").click(function(){
		var user_id='<?php echo $userid ; ?>';
		var pass = document.getElementById('newpass').value;
		var cpass = document.getElementById('cpass').value;
		var passpatt1 = /[a-z]/g;
		var passpatt2 = /[A-Z]/g;
		var passpatt3 = /\d/g;
		var len = pass.length;
		if(!pass.match(passpatt1))
		{
		swal({ icon: 'error' , text: 'Atleast one lowercase letter required' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});		
		}
		else if(!pass.match(passpatt2))
		{
			swal({ icon: 'error' , text: 'Atleast one uppercase letter required' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});
		}
		else if(!pass.match(passpatt3))
		{
			swal({ icon: 'error' , text: 'Atleast one numeric character required' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});
		}
		else if(len<8)
		{
			swal({ icon: 'error' , text: 'Password should contain atleast 8 characters' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});
		}
		else if(cpass!=pass)
		{
			swal({ icon: 'error' , text: ' Confirm Password does not match with above Password' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='change.php'}});
		}
		else{
			$.ajax({
				url:'changepassword.php',
				type:'POST',
				data:{ userid: user_id , newpass:pass },
				success : function(data)
				{
					if(data=="Failed")
					{
						swal({ icon: 'error' , text: 'Password Updation Failed' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='changepass.php'}});
					}
					else if(data=="Updated")
					{
						swal({ icon: 'success' , text: 'Password Updated' , buttons:{confirm:'OK'}}).then(val => {if(val){window.location.href='index.php'}});
					}
				}
			});
		}
	});
</script>
</body>
</html>