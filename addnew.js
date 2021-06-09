function fn1()
       {
           var a = document.form.item.value ;
           var b = document.form.lprice.value;
           var c = document.form.remarks.value;
           if(a!="" && b!=0 && c!="")
           {
               document.getElementById("fora").action="check3.php";
               return true;
           }
           else
           {
               alert("Something is wrong") ; 
               return false ;
           }
       }
function fn2()
       {
           document.getElementById("fora").action="home.php" ;
       }