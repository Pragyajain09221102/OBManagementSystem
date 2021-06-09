<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
       </style>
    </head>
</html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="order.css" />
<script src="order.js"></script>
<style>
     #loader{
               position: fixed;
               overflow: hidden;
               width: 100%;
               height:100vh;
               background:#fff url('images/Spinner-1s-200px.gif')no-repeat center;
               z-index:99999;
           }
</style>
<script>
   function fnc1()
   {
       window.location.href="home.php";
   }
</script>
    </head>
    <body onload="load()">
        <div id="loader"></div>
        <form name="form"  method="POST" id="fora" autocomplete="off" >
        <div class="container">
             <div class="c">
    <table border="2px" class="table table-striped">
                <thead>
                    <tr>
                        <td colspan="4" style="font-size:27px" class="text-center bg-dark text-white">Requirements</td>
                    </tr>
                    <tr class="bg-primary text-white text-center">
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Edit</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    include 'config.php';
                    if($conn)
                    {
                    $query="select * from item where Available<=LessThanQty";
                    $data=mysqli_query($conn,$query);
                    $tot=mysqli_num_rows($data);
                    $id=0;
                    
                    if($tot!=0)
                    {
                    while($result=mysqli_fetch_assoc($data))
                    {
                        
                    
                    ?>
                    
                    <tr class="text-center" >
                        <td><?php echo $id+1 ;?></td>
                        <td><?php $b= $result['Name'] ; echo $b;?></td>
                        <td><?php echo $c=$result['Available'];  ?></td>
                        <td class="text-center"><a id="a1" class="text-center" href='add2.php?id=<?php echo urlencode($b) ?>'>Add</a></td>
                  </tr>
                    <?php $id++;
                    
                    }
                    }
                    else{
                   echo("<script>swal({ icon: 'info' , text: 'All items are Available' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='home.php'}}); </script>");             
                    }
                    }
                    else{
                        echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
                    }
                    ?>
                </tbody>
                
            </table>
        
        <script>
            $(document).ready(function(){
                $('table').DataTable({
                     "lengthMenu": [[25,100, 500, -1], [25,100, 500,"All"]],
                     "bSort":false
                     
                });
            })
                        </script>
                        <center><button type='button' style="margin-top:10px" class="btn-danger btn text-center" onclick="fnc1()">Back</button></center>
             </div></div>
        </form>
        <script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>