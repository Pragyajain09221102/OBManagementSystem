<!DOCTYPE html>
<html>
<head>
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
	<title></title>
<style type="text/css">
	*{
		margin:0;
		padding: 0;
		box-sizing: border-box;
	}
	html{
		font-size: 10px;
	}
	body{
		height: 100vh;
		width: 100vw;
		display: grid;
		place-items:center;
		background: url('images/background.png');
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.forget{
		display: grid;
		place-items:center;
		width: 60vw;
		height:60vh;
		background-color: rgba(255,255,255,0.4);
	}
	::placeholder{
		text-align: center;
		font-weight: bold;
		color: black;
		font-size: 2rem;
	}
	input{
		width: 250px;
		height: 50px;
		text-align: center;
		font-weight: bold;
		font-size: 2rem;
	}
	.nextbtn{
		width: 250px;
		height: 40px;
		font-size: 1.4rem;
		font-weight: bold;
	}
	.swal-text{
		font-weight: bold;
		font-size: 2rem;
	}
</style>
</head>
<body>
<div class="container-fluid forget p-0 m-0">
	<form method="POST" id="formnext">
		<table class="table table-borderless">
		<tbody>
			<tr>
				<th><input type="text" id="email" name="em" placeholder="Enter your email"></th>
			</tr>
			<tr>
				<th><button type="button" name="next" class="btn nextbtn btn-warning">Next</button></th>
			</tr>
		</tbody>
	</table>
	</form>
</div>
<script type="text/javascript">
	$(".nextbtn").click(function(){
		var email = document.getElementById('email').value;
		var emailpatt = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(!emailpatt.test(email))
		{
		swal({ icon:'error' , text: 'Correct Email Format:abc@xyz.com' , buttons:{confirm:'Ok'}});	
		}
		else{
			$('.nextbtn').attr('type','submit');
			document.getElementById('formnext').action='changepass.php';
		}
	});
</script>
</body>
</html>