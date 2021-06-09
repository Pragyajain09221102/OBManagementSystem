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
if(isset($_POST['sub']))
{
    include 'config.php';
    $bi = $_POST['bill'];
    $first="Create table $bi(Item varchar(500) NOT NULL Unique , Qty varchar(30) NOT NULL, `List Price` varchar(30) NOT NULL , Discount varchar(10) NOT NULL , Price varchar(30) NOT NULL , Amount varchar(30) NOT NULL, Remarks varchar(6000) NOT NULL , QD date NULL)";
    $first_q = mysqli_query($conn,$first);
    if($first_q)
    {
    $b = $_POST['item'];
    $e = $_POST['quantity'];
    $z = $_POST['price'];
    $s=$_POST['discount'];
    $qd=date('Y/m/d');
    if($z=="" || $z==0)
    {
        $query="Select * from item where id='$b'";
        $data=mysqli_query($conn,$query);
        while($result=mysqli_fetch_assoc($data))
        {
            $case = $result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amt=(float)$s/100;
            $amt1=$c*(1-$amt);
            $amt4=round($amt1,2);
            $amt2=$amt1*$e;
            $amt3=round($amt2,2);
            $query1="Insert into $bi values('$case','$e','$c','$s','$amt4','$amt3','$d','$qd')";
            $data1=mysqli_query($conn,$query1);
            if($data1)
            {
                 echo("<script>window.location.href='generate.php' </script>");
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
    else{
        $query3="Select * from item where id='$b'";
        $data3=mysqli_query($conn,$query3);
        while($result=mysqli_fetch_assoc($data3))
        {
            $case=$result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amtt=(float)($c-$z)*100;
            $amtt1=(float)$amtt/$c;
            $amtt2=(float)$e*$z;
            $amtt3=round($amtt1,2);
            $amtt4=round($amtt2,2);
            $query1="Insert into $bi values('$case','$e','$c','$amtt3','$z','$amtt4','$d','$qd')";
            $data1=mysqli_query($conn,$query1);
            if($data1)
            {
                 echo("<script>window.location.href='generate.php' </script>");
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
}    
else{
    $b = $_POST['item'];
    $e = $_POST['quantity'];
    $z = $_POST['price'];
    $s=$_POST['discount'];
    $qd=date('Y/m/d');
    if($z=="" || $z==0)
    {
        $query="Select * from item where id='$b'";
        $data=mysqli_query($conn,$query);
        while($result=mysqli_fetch_assoc($data))
        {
            $case = $result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amt=(float)$s/100;
            $amt1=$c*(1-$amt);
            $amt4=round($amt1,2);
            $amt2=$amt1*$e;
            $amt3=round($amt2,2);
            $query1="Insert into $bi values('$case','$e','$c','$s','$amt4','$amt3','$d','$qd')";
            $data1=mysqli_query($conn,$query1);
            if($data1)
            {
                 echo("<script>window.location.href='generate.php' </script>");
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
    else{
        $query3="Select * from item where id='$b'";
        $data3=mysqli_query($conn,$query3);
        while($result=mysqli_fetch_assoc($data3))
        {
            $case=$result['Name'];
            $a=$result['Available'];
            $c=$result['List Price'];
            $d=$result['Remarks'];
        }
        if($e>$a)
        {
             echo("<script>swal({ icon: 'error' , text: 'No Enough Stock' , buttons:{confirm:'Add Stock' , cancel:'Cancel'}}).then(val => {if(val){window.location.href='add1.php'}else{window.location.href='generate.php'}});</script>");
        }
        else{
            $amtt=(float)($c-$z)*100;
            $amtt1=(float)$amtt/$c;
            $amtt2=(float)$e*$z;
            $amtt3=round($amtt1,2);
            $amtt4=round($amtt2,2);
            $query1="Insert into $bi values('$case','$e','$c','$amtt3','$z','$amtt4','$d','$qd')";
            $data1=mysqli_query($conn,$query1);
            if($data1)
            {
                 echo("<script>window.location.href='generate.php' </script>");
            }
            else{
                echo("<script>swal({ icon: 'error' , text: 'Insertion Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='generate.php'}}); </script>");        
            }
        }
    }
}
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