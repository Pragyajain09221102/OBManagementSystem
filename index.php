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
        <link rel="stylesheet" href="">
        <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .maindiv
        {
            width:100vw;
            height:100vh;
            display:grid;
            place-items:center;
            background:url("images/loginback.jpg");
            background-size:100vw 100vh;
            background-position:fixed;
            background-repeat:no-repeat;
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
            .login-div
            {
                height:50vh;
                width:100vw;
                background-color:rgba(0,0,0,0.4);
            }
            .btndiv{
                height:50vh;
                display:grid;
                place-items:center;
                background:url("images/bg.jpg");
                background-size:100% 100%;
                background-position:fixed;
                background-repeat:no-repeat;
                }
            .buttondiv
            {
                height:200px;
                width: 390px;
                display:grid;
                place-items:center;
            }
            .formdiv{
                display:grid;
                place-items:center;
            }
            .fp,.register
            {
                width:350px;
                height:70px;
            }
            .input{
                width:350px;
                height:70px;
                text-align:center;
                font-size:29px;
                font-weight:bold;
            }
            ::placeholder{
                text-align:center;
                font-size:29px;
                font-weight:bold;
            }
           .loginbtn
           {
               width:350px;
               height:70px;
           }
           .btn{
               font-size:29px;
               font-weight:bold;
           }
        }
        @media (min-width: 992px) and (max-width: 1199.98px)
        {
            .login-div
            {
                height:80vh;
                width:100vw;
                background-color:rgba(0,0,0,0.4);
            }
            .btndiv{
                height:80vh;
                display:grid;
                place-items:center;
                background:url("images/bg.jpg");
                background-size:100% 100%;
                background-position:fixed;
                background-repeat:no-repeat;
                }
            .buttondiv
            {
                height:210px;
                width: 390px;
                display:grid;
                place-items:center;
            }
            .formdiv{
                display:grid;
                place-items:center;
            }
            .fp,.register
            {
                width:410px;
                height:80px;
            }
            .input{
                width:400px;
                height:70px;
                text-align:center;
                font-size:26px;
                font-weight:bold;
            }
            ::placeholder{
                text-align:center;
                font-size:26px;
                font-weight:bold;
            }
           .loginbtn
           {
               width:400px;
               height:70px;
           }
           .btn{
               font-size:28px;
               font-weight:bold;
           }
        }
        @media (min-width: 1200px) and (max-width: 1299.98px)
        {
            .login-div
            {
                height:80vh;
                width:80vw;
                background-color:rgba(0,0,0,0.4);
            }
            .btndiv{
                height:80vh;
                display:grid;
                place-items:center;
                background:url("images/bg.jpg");
                background-size:100% 100%;
                background-position:fixed;
                background-repeat:no-repeat;
                }
            .buttondiv
            {
                height:210px;
                width: 390px;
                display:grid;
                place-items:center;
            }
            .formdiv{
                display:grid;
                place-items:center;
            }
            .fp,.register
            {
                width:350px;
                height:70px;
            }
            .input{
                width:300px;
                height:50px;
                text-align:center;
                font-size:23px;
                font-weight:bold;
            }
            ::placeholder{
                text-align:center;
                font-size:23px;
                font-weight:bold;
            }
           .loginbtn
           {
               width:300px;
               height:50px;
           }
           .btn{
               font-size:23px;
               font-weight:bold;
           }
        }
        @media (min-width: 1300px) and (max-width: 1399.98px)
        {
            .login-div
            {
                height:80vh;
                width:60vw;
                background-color:rgba(0,0,0,0.4);
            }
            .btndiv{
                height:80vh;
                display:grid;
                place-items:center;
                background:url("images/bg.jpg");
                background-size:100% 100%;
                background-position:fixed;
                background-repeat:no-repeat;
                }
            .buttondiv
            {
                height:210px;
                width: 390px;
                display:grid;
                place-items:center;
            }
            .formdiv{
                display:grid;
                place-items:center;
            }
            .fp,.register
            {
                width:250px;
            }
            .input{
                width:300px;
                height:50px;
                text-align:center;
                font-size:17px;
                font-weight:bold;
            }
            ::placeholder{
                text-align:center;
                font-size:17px;
                font-weight:bold;
            }
           .loginbtn
           {
               width:300px;
               height:50px;
           }
           .btn{
               font-size:17px;
               font-weight:bold;
           }
        }
        @media(min-width: 1400px)
        {
            .login-div
            {
                height:80vh;
                width:80vw;
                background-color:rgba(0,0,0,0.4);
            }
            .btndiv{
                height:80vh;
                display:grid;
                place-items:center;
                background:url("images/bg.jpg");
                background-size:100% 100%;
                background-position:fixed;
                background-repeat:no-repeat;
                }
            .buttondiv
            {
                height:210px;
                width: 390px;
                display:grid;
                place-items:center;
            }
            .formdiv{
                display:grid;
                place-items:center;
            }
            .fp,.register
            {
                width:350px;
                height:70px;
            }
            .input{
                width:300px;
                height:50px;
                text-align:center;
                font-size:22px;
                font-weight:bold;
            }
            ::placeholder{
                text-align:center;
                font-size:22px;
                font-weight:bold;
            }
           .loginbtn
           {
               width:300px;
               height:50px;
           }
           .btn{
               font-size:22px;
               font-weight:bold;
           }
        }
        </style>
    </head>
    <body>
    <div class="container-fluid m-0 p-0 maindiv">
        <div class="container-fluid m-0 p-0 login-div">
            <div class="row m-0 p-0 logdiv">
            <div class="col-md-6 btndiv">
                <div class="container-fluid m-0 p-0 buttondiv">
                    <form action="" class="">
                    <button type="button" class="btn btn-primary register">Register</button><br>
                    <button type="button" class="btn btn-warning mt-3 fp">Forget Password</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 formdiv">
            <form action="" class="form1" id="myform" method="POST">
            <div class="row innerform d-flex justify-content-center">
            <input type="text" name="email" class="col-12 input" id="emaiil" placeholder="Enter your Email">
            <input type="password" name="pass" class="col-12 mt-4 input" id="password" placeholder="Enter your Password">
            <button type="button" id="logbtn" class="btn btn-info mt-4 loginbtn" name="sub">Login</button>
            </div>
            </form>
            </div>
            </div> 
        </div>
    </div>
    <div class="container-fluid m-0 p-0 errordiv"> 
    <h1 class="text-center">Website Not Supported on this device</h1>
    </div>
    <script>
    $(".register").click(function(){
        window.location.href="registration.php";
    });
    $(".loginbtn").click(function(){
        let email = document.getElementById("emaiil").value;
        let password = document.getElementById("password").value;
        if(email=="" || password=="")
        {
            swal({ icon:'error' , text: 'Anyfield cannot be empty' , buttons:{confirm:'Ok'}});	
        }
        else{
            document.getElementById("logbtn").type="submit";
            document.getElementById("myform").action="checklogin.php";
        }
    });
    $(".fp").click(function(){
        window.location.href="forgetpass.php";
    });
    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>