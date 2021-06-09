<?php
session_start();
?>
<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
        
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
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
    </head>
<body onload="load()">
        <div id="loader"></div>
<?php
include 'config.php';
if($conn)
{
    $fn=$_SESSION['ide1'];
    $query="Select * from $fn";
    $data=mysqli_query($conn,$query);
    while($result=mysqli_fetch_assoc($data))
    {
        $a=$result['Item'];
        $b=$result['Qty'];
        $query1="Select * from item where Name='$a'";
        $data1=mysqli_query($conn,$query1);
        while($result1=mysqli_fetch_assoc($data1))
        {
            $c=$result1['Available'];
            if($c>=$b)
            {
                $actual=$c-$b;
                date_default_timezone_set('Asia/Kolkata');
$datee=date('Y-m-d H:i:s');
$qu="Update item set LastUpdate='$datee'";
$sq = mysqli_query($conn,$qu);
                $query2="Update item set Available='$actual' where name='$a'";
                $data2=mysqli_query($conn,$query2);
                $query3 = "Select * from outofstock where Item = '$a'";
                $data3 = mysqli_query($conn,$query3);
                $tot = mysqli_num_rows($data3);
                if($tot!=0)
                {
                    $query4="update outofstock set Qty='$actual' where item='$a'";
                    $data4=mysqli_query($conn,$query4);
                    if($data4)
                    {
                        echo("<script>window.location.href='bill1.php'</script>");        
                    }
                }
                else{
                    echo("<script>window.location.href='bill1.php'</script>");
                }
            }
            else{
                   echo("<script>swal({ icon: 'error' , text: 'Bill cannot be confirmed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
}
else{
        echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
?>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
</body>
</html>