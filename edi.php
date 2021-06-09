<html>
    <head>
        <script src='sweetalert/dist/sweetalert.min.js'></script>
       <style>
           .swal-text{
               font-size:23px;
               font-weight:bold;
           }
           body { 
	font-family: 'Ubuntu', sans-serif;
	font-weight: bold;
}
.select2-container {
  min-width: 400px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #f77750;
	border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
	display: none;
}
.select-icon .placeholder {
	display: none;
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
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
#loader{
               position: fixed;
               overflow: hidden;
               width: 100%;
               height:100vh;
               background:#fff url('images/Spinner-1s-200px.gif')no-repeat center;
               z-index:99999;
           }

.container{
 float:left;
 margin-left:13px;
    min-height:400px;
    height:auto;
width:auto;
min-width:1200px;
position: absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
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
       <script>
           function edit(){
               document.getElementById("fora").action='edit.php'; 
           }
           function f(){
               document.getElementById("fora").action='brand.php' ;
           }
       </script>
    </head>
</html>
        <?php
include 'config.php';
if($conn)
{ 
    $query="Select * from item" ;
    $da=mysqli_query($conn,$query);
    $options="" ;
    while($table=mysqli_fetch_array($da))
    {
        $first=$table['Name'];
        $second=$table['Id'];
        $options=$options."<option value=$second>$first</option>" ;
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
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    </head>
    <body onload="load()">
        <div id="loader"></div>
        <form name="form"  method="POST" id="fora" autocomplete="off" >
            <div class="container">
                <br>       
                <table class="table table-striped table-hover table-bordered">
                    <tr class="text-center" style="font-size:25px ; text-align:center"><td colspan="2">Edit Details</td></tr>  
                <tr class="bg-dark text-white text-center"><td>Select an Item</td>
                    <td>Edit</td></tr>  
                <tr class="text-center">
                <td><select multiple="multiple" class="form-control select2" id="sel" name="records[]">

            <?php echo $options ; ?>
        </select>
                </td>
                <td><input type="submit" value="Edit" name="bt" class="btn-success btn" id='bv' onclick="edit()"></td>
                <tr>
                    <td colspan="2"><center><input type="submit" value="Back" name="bt4" class="btn-danger btn" id='bvi' onclick="f()"></center></td>
                </tr>
               
                </table>
        <br>
        
                </div>
        <script>
       $('.select2').select2({
           closeOnSelect : false,
           placeholder:"SELECT atleast 2" ,
           enableFiltering:true,
           dropupAuto:false
       });
      </script>
        </form>
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
            var pre = document.getElementById('loader');
            function load()
            {
                pre.style.display='none';
            }
        </script>
    </body>
</html>