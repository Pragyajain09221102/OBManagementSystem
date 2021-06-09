  function f()
            {
                document.getElementById("fora").action="home.php" ;
            }
       function fn1()
       {
           
           var e = document.getElementById("sel");
           var f = e.options[e.selectedIndex].text;
           if(f!="Select One")
           {
               document.getElementById("fora").action="check.php";
               return true ;
           }
           else{
               alert("Please select an item");
               return false;
           }
       }
       function fn2()
       {
           
               document.getElementById("fora").action="add.php";
              
       }
       
      