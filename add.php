<?php
include 'config.php';
?>
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
<?php
include 'config.php';
if($conn)
{ 
    $query="Select Name from item" ;
    $da=mysqli_query($conn,$query);
    $options="" ;
    while($table=mysqli_fetch_array($da))
    {
        $options=$options."<option class='o'>$table[0]</option>" ;
      }
}
else{
    echo("<script>swal({ icon: 'error' , text: 'Invalid Credentials,Connection Failed' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='index.php'}}); </script>");        
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
        <script>
            function f()
            {
                document.getElementById("fora").action="home.php" ;
            }
       
      
        </script>
        <style>
            input::-webkit-calendar-picker-indicator {
            opacity:100;
}
.i1{
    text-align: center;
}

#sel{
    width:230px;
    border:2px solid black;
}


.container{
    position: absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
    min-height:400px;
    height:auto;
width:auto;
min-width:1200px;
}
.table{
    font-weight:bold;
    font-size:19px;
    width:100%;
    
}
.c{
        border:5px solid black;
    height:400px;
    width:500px;
    position: absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
}
input{
    text-align: center;
    border:2px solid black;
    font-weight: bold;
    font-size:19px;
}
input::-webkit-calendar-picker-indicator {
opacity:100;
}
            .btn{
                font-size: 19px;
                font-weight: bold;
                width:100px;
            }
            .btn:hover{
                border:3px solid black;
            }
            #a1{
                text-decoration: none;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    </head>
    <body>
        <form name="form"  method="POST" id="fora" autocomplete="off" >
            <div class="container">
                <br>       
                <table class="table table-striped table-hover table-bordered">
                    <tr class="text-center" style="font-size:25px ; text-align:center"><td colspan="2">ADD STOCK</td></tr>  
                <tr class="bg-dark text-white text-center"><td>Select an Item</td>
                    <td>Update</td></tr>  
                <tr class="text-center">
                <td><select class="form-control select2" id="sel" name="er">
             <option selected="selected" class="o1">Select One</option>
            <?php echo $options ; ?>
        </select>
                </td>
                <td><input type="submit" value="Change" name="bt" class="btn-success btn" id='bv'></td>
                <tr>
                    <td colspan="2"><center><input type="submit" value="Back" name="bt4" class="btn-danger btn" id='bvi' onclick="f()"></center></td>
                </tr>
               
                </table>
        <br>
        <script>
            function fnb()
            {
                document.getElementById("fora").action="check1.php";
            }
            function fnb1()
            {
                document.getElementById("fora").action="add.php";
            }
        </script>
        <?php
        if(isset($_POST['bt']))
        {
            $mn = $_POST['er'];
            if($mn=="Select One")
            {
                echo("<script>swal({ icon: 'error' , text: 'No Item Selected' , buttons:{confirm:'Ok'}}).then(val => {if(val){window.location.href='add.php'}}); </script>");        
            }
            else{
                include 'config.php';
if($conn)
{ 
    $query2="Select * from item where Name='$mn'" ;
    $da2=mysqli_query($conn,$query2);
  
    while($table1=mysqli_fetch_array($da2))
    {
      
        $av=$table1['Available'];
        $da=$table1['Discount'];
        $pri=$table1['List Price'];
        $nm=$table1['Remarks'];
    }
    ?>
        <table class="table table-striped table-hover table-bordered text-center">
            <tr>
                <th>Item Name</th>
                <th>Change Quantity</th>
                <th>Change Price</th>
                <th>Change Discount</th>
                <th>Change Remarks</th>
            </tr>
            <tr>
                <td><input type="text" name="qwert" readonly="readonly" value="<?php echo $mn ;?>" ></td>
                <td><input type="number" value="0" step="0.01" min="0" name = "r" id="i2" ></td>
                <td><input type="number" step="0.01" value="<?php echo $pri ;?>" min="0.01" name = "price" id="i3" ></td>
                <td><input type="number" step="0.01" value="<?php echo $da ;?>" min="0" name = "das" id="i4" max="100" ></td>
                <td><input type="text" name="remark" style="width:150px"  value="<?php echo $nm ;?>" ></td>
            </tr>
            <tr>
                 <tr class="text-center">
                     <td colspan="5"><center><input type="submit" class="btn-danger btn" value="Back"   onclick="fnb1()" >
                  <input type="submit" value="Update" onclick="fnb()" class="btn-success btn" ></center></td>
                </tr>
            
        </table>
        <?php
} }
        }
        ?>
                </div>
        <script>
       $('.select2').select2();
      </script>
        </form>
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>