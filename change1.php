<!DOCTYPE html>
<html>
<head>
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
<!-- Sweetalert cdn -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- datatable cdn -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
	<title></title>
<style type="text/css">
	*{
		margin:0;
		padding:0;
		box-sizing: border-box;
	}
	html{
		font-size:10px;
	}
	body{
		width: 100vw;
		height:100vh;
		background-image: url("images/background.png");
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
		background-attachment: fixed;
		display: grid;
		place-items:center;
	}
	.swal-text
	{
		font-size:2rem;
		font-weight: bold;
	}
	.main-div{
		width: 55rem;
		height:30rem;
		background-color:rgba(0,0,0,0.4);
	}
	.mainthead{
		display: grid;
		place-items:center;
		font-size:2rem;
		letter-spacing: 0.2rem;
		width: 100%;
		height:10vh;
		background-color: black;
		color: white;
	}
	.subdiv{
		width: 100%;
		height:42vh;
		display: grid;
		place-items:center;
	}
	.in1{
		margin-left: 10rem;
		font-size:2rem;
		font-weight:bold;
	}
	.cm{
		margin-top: 2rem;
		width: 25rem;
		height:4rem;
		font-size: 2rem;
		color:black;
		font-weight: bold;
	}
	.cm:hover{
		color: black;
	}
</style>
</head>
<body>
<div class="container-fluid p-0 m-0 main-div">
	<form method="POST" enctype="multipart/form-data" id="form1">
	<h1 class="mainthead text-center">Upload CSV File</h1>
	<div class="container-fluid p-0 m-0 subdiv bg-warning">
		<center><input type="file" name="csvfile" class="in1" id="file1"><br>
			<button type="button" name="sub1" class="btn btn-primary cm">Import</button>
		</center>
	</div>
	</form>
</div>
<script type="text/javascript">
	$(".cm").click(function(){
		var val = document.getElementById('file1').value;
		if(val=="")
		{
			swal({ icon: 'error' , text: 'Please choose a file' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='change.php'}});
		}
		else{
			$(".cm").attr("type","submit");
			document.getElementById("form1").action="changed1.php";
            $(".cm").css("display","none");
		}
	});
</script>
</body>
</html>