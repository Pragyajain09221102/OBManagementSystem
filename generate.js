         function cack1()
            {
                window.location.href="generate.php";
            }                                                                                                                  
       function fn1()
       {
           
           var e = document.getElementById("i4").value;
            var f = document.getElementById("i3").value;
           if(f!=0 || e!=0)
           {
               document.getElementById("fora").action="check.php";
               return true ;
           }
           else{
              alert("Something went wrong");
               return false;
           }
       }
       
       function fnn(event)
       {
           event.preventDefault();
          var x = event.which || event.keycode;
          
          if(x==13)
          {
              
              document.getElementById('i3').focus();
          }
       }
       
       function nv(){
           alert("DISIIS");
       }
       function gn()
       {
         var b = document.getElementById("i4").value ;
          if(b!=0)
          {
              document.getElementById("i3").style.backgroundColor="gainsboro";
              document.getElementById("i3").value="0";
              document.getElementById("i3").readOnly=true;
          }
          else{
              document.getElementById("i3").style.backgroundColor="white";
              document.getElementById("i3").readOnly=false;
          }
       }
       function gn1()
       {
         var b = document.getElementById("i3").value ;
          if(b!=0)
          {
              document.getElementById("i4").style.backgroundColor="gainsboro";
              document.getElementById("i4").value="0";
              document.getElementById("i4").readOnly=true;
            
          }
          else{
              document.getElementById("i4").style.backgroundColor="white";
              document.getElementById("i4").readOnly=false;
          }
       }
      
