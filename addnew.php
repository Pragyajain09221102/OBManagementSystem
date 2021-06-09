
<html>
    <head>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="addnew.css" />
    <script src="addnew.js"></script>
    </head>
    <body>
        <form name="form" method="POST" id="fora" autocomplete="off" >
            <div class="container">
                <div class="c">
                    <div class="c1">ADD NEW ITEM</div>    
            <table class="tb">
                <tr style="margin-top:20px;">
                <td> Item : </td><td><input type="text" max="100000000" id="i1" name="item">
                </td></tr>
                <tr>
                <td>
                   List Price :</td><td><input type="number" pattern=[0-9]{1} title="Only Numbers" value="0.01" step='0.01' min="0.01" name = "lprice" id="i2" ></td></tr>
                <tr>
                <td>
                    Quantity Available :</td><td><input  type="number" pattern=[0-9]{1} title="Only Numbers" step='0.01' value="0.01" min="0" name = "quantity" id="i3"></td></tr>
                <tr>
                <td>
                    Discount :</td><td><input type="number" pattern=[0-9]{1} title="Only Numbers" step='0.01' value="0" min="0" max="100" name = "discount" id="i4"></td></tr>
                <tr>
                    
                <td> Remarks : </td><td><input type="text"   name="remarks" max="60000000">
                </td></tr>
                <tr><td colspan="2">  <input type="submit" style="font-weight:bold;font-size:23px;" class="btn-success btn" value="Add item" name="sub" onclick="fn1()">
                <input type="submit" value="Back" name="sup" class="btn-danger btn" style="font-weight:bold;font-size:23px;"  onclick="fn2()" ></td></tr>
            </table><br>
        <br>
        
                </div></div>
        
        </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    </body>
</html>
