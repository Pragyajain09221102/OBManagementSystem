
function fb()
            {
                window.location.href="generate.php";
            }
function f10(paravalue)
        {
            var backup=document.body.innerHTML;
            var divContent = document.getElementById(paravalue).innerHTML;
            document.body.innerHTML=divContent;
            window.print();
            document.body.innerHTML=backup;
            document.getElementById("bb1").disabled=true;
            
        }
   
       function f11(){
           document.getElementById("bb1").disabled=true;
           document.getElementById("bb2").style.display="";
           document.getElementById("bb3").style.display="" ;
       }
       function sve(){
          window.location.href="check5.php";
       }