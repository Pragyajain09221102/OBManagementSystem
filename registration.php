<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- Fontawesome link -->
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jquery link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- ajax link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Sweetalert cdn -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">
        <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .swal-text
        {
            font-weight:bold;
            font-size:22px;
            font-family: 'Kalam', cursive;
        }
        .maindiv
        {
            width:100vw;
            height:100vh;
            display:grid;
            place-items:center;
            background:url("images/back.jpg");
            background-size:100vw 100vh;
            background-position:fixed;
            background-repeat:no-repeat;
        }
        .formdiv{
            background-color:rgba(255,255,255,0.7);
        }
        .errordiv{
            width:100vw;
            height:100vh;
            display:grid;
            place-items:center;
            font-size:30px;
            display:none;
            font-weight:bold;
        }

        @media(min-width: 0px) and (max-width: 767.98px)
        {
            .maindiv
            {
                display:none;
            }
            .errordiv
            {
                display:grid;
            }
        }
        @media (min-width: 768px) and (max-width: 991.98px) 
        {
            .formdiv
            {
                height:90vh;
                width:90vw;
                background-color:white;
                overflow:auto;
                padding-bottom:20px;
            }
            
            .formhead
            {
                height:19vh;
                display:grid;
                place-items:center;
                font-size:70px;
                font-weight:bold;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:44px;
                font-weight:bold;
            }
            .icon
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:11.5%;
                transform:translate(,-11.5%);
            }
            .icon1
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:29.5%;
                transform:translate(,-29.5%);
            }
            .icon2
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:50%;
                transform:translate(,-50%);
            }
            .icon3
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:68%;
                transform:translate(,-68%);
            }
            .input{
                margin-top:7px;
                width:650px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:44px;
                font-weight:bold;
                transition:all 12s linear;
                outline:none;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:44px;
            }
            .registerbtn{
                margin-top:70px;
                width:580px;
                border-radius:25px;
                font-weight:bold;
                font-size:34px;

            }
            .loginbtn{
                margin-top:30px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px)
        {
            .formdiv
            {
                height:90vh;
                width:90vw;
                background-color:white;
                overflow:auto;
                padding-bottom:20px;
            }
            
            .formhead
            {
                height:19vh;
                display:grid;
                place-items:center;
                font-size:70px;
                font-weight:bold;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:44px;
                font-weight:bold;
            }
            .icon
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:11.5%;
                transform:translate(,-11.5%);
            }
            .icon1
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:29.5%;
                transform:translate(,-29.5%);
            }
            .icon2
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:50%;
                transform:translate(,-50%);
            }
            .icon3
            {
                font-size:42px;
                position: absolute;
                left:5% !important;
                top:68%;
                transform:translate(,-68%);
            }
            .input{
                margin-top:7px;
                width:650px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:44px;
                font-weight:bold;
                transition:all 12s linear;
                outline:none;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:44px;
            }
            .registerbtn{
                margin-top:70px;
                width:580px;
                border-radius:25px;
                font-weight:bold;
                font-size:34px;

            }
            .loginbtn{
                margin-top:30px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1299.98px)
        {
            .formdiv
            {
                height:100vh;
                width:600px;
                background-color:white;
                overflow:auto;
            }
            
            .formhead
            {
                height:19vh;
                display:grid;
                place-items:center;
                font-size:55px;
                font-weight:bold;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:22px;
                font-weight:bold;
            }
            .icon
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:11.5%;
                transform:translate(,-11.5%);
            }
            .icon1
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:30.2%;
                transform:translate(,-30.2%);
            }
            .icon2
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:48.5%;
                transform:translate(,-48.5%);
            }
            .icon3
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:66.5%;
                transform:translate(,-66.5%);
            }
            .input{
                margin-top:7px;
                width:400px;
                height:50px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:25px;
                font-weight:bold;
                transition:all 12s linear;
                outline:none;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:30px;
            }
            .registerbtn{
                margin-top:35px;
                width:400px;
                border-radius:25px;
                font-weight:bold;
                font-size:23px;

            }
        }
        @media (min-width: 1300px) and (max-width: 1399.98px)
        {
            .formdiv
            {
                height:94vh;
                width:400px;
                background-color:white;
            }
            
            .formhead
            {
                height:14vh;
                display:grid;
                place-items:center;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:15px;
                font-weight:bold;
            }
            .icon
            {
                position: absolute;
                left:5% !important;
                top:13%;
                transform:translate(,-13%);
            }
            .icon1
            {
                position: absolute;
                left:5% !important;
                top:30.5%;
                transform:translate(,-30.5%);
            }
            .icon2
            {
                position: absolute;
                left:5% !important;
                top:48.5%;
                transform:translate(,-48.5%);
            }
            .icon3
            {
                position: absolute;
                left:5% !important;
                top:66.5%;
                transform:translate(,-66.5%);
            }
            .input{
                margin-top:7px;
                width:250px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:15px;
                font-weight:bold;
                background-color:white;
                transition:all 12s linear;
                outline:none;
                -webkit-box-shadow: 0 0 0 1000px white inset !important;
            }
            .intput:focus{
                background-color:white;
            }
            .intput:active{
                background-color:white;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:15px;
            }
            .registerbtn{
                margin-top:20px;
                width:260px;
                border-radius:25px;
                font-weight:bold;
                font-size:17px;

            }
        }
        @media(min-width: 1400px) and (max-width: 1499.98px)
        {
            .formdiv
            {
                height:94vh;
                width:600px;
                background-color:white;
            }
            
            .formhead
            {
                height:19vh;
                display:grid;
                place-items:center;
                font-size:55px;
                font-weight:bold;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:30px;
                font-weight:bold;
            }
            .icon
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:13%;
                transform:translate(,-13%);
            }
            .icon1
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:31.5%;
                transform:translate(,-31.5%);
            }
            .icon2
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:50%;
                transform:translate(,-50%);
            }
            .icon3
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:69%;
                transform:translate(,-69%);
            }
            .input{
                margin-top:7px;
                width:460px;
                height:50px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:30px;
                font-weight:bold;
                transition:all 12s linear;
                outline:none;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:30px;
            }
            .registerbtn{
                margin-top:36px;
                width:400px;
                border-radius:25px;
                font-weight:bold;
                font-size:23px;

            }
        }
        @media(min-width: 1500px) and (max-width: 2700.98px)
        {
            .formdiv
            {
                height:94vh;
                width:600px;
                background-color:white;
                overflow:auto;
            }
            
            .formhead
            {
                height:19vh;
                display:grid;
                place-items:center;
                font-size:55px;
                font-weight:bold;
            }
            .formcontent
            {
                display:flex;
                flex-direction:column;
                position: relative !important;
            }
            .lab{
                margin-top:20px;
                font-size:30px;
                font-weight:bold;
            }
            .icon
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:13%;
                transform:translate(,-13%);
            }
            .icon1
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:31.5%;
                transform:translate(,-31.5%);
            }
            .icon2
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:50%;
                transform:translate(,-50%);
            }
            .icon3
            {
                font-size:30px;
                position: absolute;
                left:5% !important;
                top:69%;
                transform:translate(,-69%);
            }
            .input{
                margin-top:7px;
                width:460px;
                height:50px;
                border:none;
                border-bottom:2px solid black;
                text-align:center;
                font-size:30px;
                font-weight:bold;
                transition:all 12s linear;
                outline:none;
                -webkit-box-shadow: 0 0 0 1000px white inset !important;
            }
            ::placeholder{
                text-align:center;
                font-style:italic;
                font-size:30px;
            }
            .registerbtn{
                margin-top:36px;
                width:400px;
                border-radius:25px;
                font-weight:bold;
                font-size:23px;

            }
        }
        @media(min-width: 2701px)
        {
            .maindiv
            {
                display:none;
            }
            .errordiv
            {
                display:grid;
            }
        }
        </style>
    </head>
    <body>
    <div class="container-fluid m-0 p-0 maindiv">
    <div class="container-fluid m-0 p-0 formdiv">
    <form method="POST" id="form1">
    <h2 class="formhead text-center m-0 p-0">Registration Form</h2>
    <div class="container-fluid formcontent">
    <label for="name" class="lab">Name</label>
    <input type="text" class="input" id="name" name="yrname" placeholder="Type your name"><i class="fa fa-user icon" aria-hidden="true"></i>
    <label for="email" class="lab">Email</label>
    <input autocomplete="false" type="text" class="input" name="yremail" id="email" placeholder="Type your email"><i class="fa fa-envelope icon1" aria-hidden="true"></i>
    <label for="password" class="lab">Password</label>
    <input type="password" class="input" id="password" name="yrpassword" placeholder="Type your password"><i class="fa fa-lock icon2" aria-hidden="true"></i>
    <label for="cp" class="lab">Confirm Password</label>
    <input type="password" class="input" id="cp" placeholder="Re-type passsword"><i class="fa fa-lock icon3" aria-hidden="true"></i>
    <button type="button" id="rbtn" class="btn btn-success registerbtn regisbtn" name="sub">Register</button>
    <button type="button" class="btn btn-primary registerbtn loginbtn">Login</button>
    </div>
    </form>
    </div>
    </div>
    <div class="container-fluid m-0 p-0 errordiv">
    <h1 class="text-center">Website Not Supported On This Device</h1>
    </div>
    <script>
    $("#name").on("change" , function(){
        let name = document.getElementById('name').value;
        name.trim();
        let namecheck = /[A-Za-z]{3,}/g;
        let patt1 = /[\/*!@#$%^&_+=|/:;<>,.?{}]/g;
        let patt2 = /[\[\]\(\)\-\`\~\']/g;
        let patt3 = /\d/;
        let len = name.length;
    if(name.match(patt1) || name.match(patt2))
    {
            swal({ icon: 'error' , text: 'Special Characters are not Allowed' , buttons:{cancel:'Ok'}});
            $('#name').css({'border-bottom':'3px Solid red'});
            $('#name').css({'transition':'0s'});
    }
    else if(name.match(patt3))
    {
            swal({ icon: 'error' , text: 'Numeric Characters are not Allowed' , buttons:{cancel:'Ok'}});
            $('#name').css({'border-bottom':'3px Solid red'});
            $('#name').css({'transition':'0s'});
    }
    else if(!name.match(namecheck))
    {
            swal({ icon: 'error' , text: 'Atleast 3 Characters Required' , buttons:{cancel:'Ok'}});
            $('#name').css({'border-bottom':'3px Solid red'});
            $('#name').css({'transition':'0s'});
    }
    else{
        $('#name').css({'border-bottom':'2px Solid black'});
            $('#name').css({'transition':'0s'});
    }
    });

    $('#email').on("change",function(){
        let email = document.getElementById('email').value;
        let emailp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(!email.match(emailp))
		{
            swal({ icon: 'error' , text: 'Invalid Email,example:abc@xyz.com' , buttons:{cancel:'Ok'}});
            $('#email').css({'border-bottom':'3px Solid red'});
            $('#email').css({'transition':'0s'});
        }
		else{
            $('#email').css({'border-bottom':'2px Solid black'});
            $('#email').css({'transition':'0s'});
		}
    });

    $('#password').on("change",function(){
        let password = document.getElementById('password').value;
        var passwordp = /[a-z]/g;
		var passwordp1 = /[A-Z]/g;
		var passwordp2 = /\d/g;
		var len = password.length;
		if(!password.match(passwordp))
		{
			swal({ icon: 'error' , text: 'Atleast one Lowercase Letter required' , buttons:{cancel:'Ok'}});
            $('#password').css({'border-bottom':'3px Solid red'});
            $('#password').css({'transition':'0s'});
		}
		else if(!password.match(passwordp1))
		{
            swal({ icon: 'error' , text: 'Atleast one Uppercase Letter required' , buttons:{cancel:'Ok'}});
            $('#password').css({'border-bottom':'3px Solid red'});
            $('#password').css({'transition':'0s'});	
		}
		else if(len<8)
		{
            swal({ icon: 'error' , text: 'Atleast 8 characters required' , buttons:{cancel:'Ok'}});
            $('#password').css({'border-bottom':'3px Solid red'});
            $('#password').css({'transition':'0s'});
		}
		else if(!password.match(passwordp2))
		{
            swal({ icon: 'error' , text: 'Atleast one Numeric Character required' , buttons:{cancel:'Ok'}});
            $('#password').css({'border-bottom':'3px Solid red'});
            $('#password').css({'transition':'0s'});	
		}
		else{
            $('#password').css({'border-bottom':'2px Solid black'});
            $('#password').css({'transition':'0s'});
		}
    });

    $('#cp').on("change",function(){
        let cp = document.getElementById('cp').value;
        var password = document.getElementById("password").value;
		if(cp!=password)
		{
			swal({ icon: 'error' , text: 'Passwords do not Match' , buttons:{cancel:'Ok'}});
            $('#cp').css({'border-bottom':'3px Solid red'});
            $('#cp').css({'transition':'0s'});
		}
		else{
            $('#cp').css({'border-bottom':'2px Solid black'});
            $('#cp').css({'transition':'0s'});
        }
    });

    $(".regisbtn").click(function(){
        document.getElementById('rbtn').type="submit";
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let cp = document.getElementById('cp').value;
        if(name=='' || email=='' || password=='' || cp=='' || document.getElementById('name').style.borderBottom=='3px solid red' || document.getElementById('email').style.borderBottom=='3px solid red' || document.getElementById('password').style.borderBottom=='3px solid red' || document.getElementById('cp').style.borderBottom=='3px solid red')
        {
            swal({ icon: 'error' , text: 'Something Went Wrong' , buttons:{cancel:'Ok'}});
        }
        else
        {
            document.getElementById('form1').action="register.php";
        }
    });

    $(".loginbtn").click(function(){
        window.location.href="index.php";
    });
    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>