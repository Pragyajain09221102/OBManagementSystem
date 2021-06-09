
        function fit1()
        {
            window.location.href="ded.php" ;
            alert("SUCCES");
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
   function fit(){
	swal({ icon: 'success' , text: 'Do you want to print or go to home page' , buttons:{confirm:'Print' , cancel:'Home'}});
};
       function f11(){
           document.getElementById("bb1").disabled=true;
           document.getElementById("bb2").style.display="";
           document.getElementById("bb3").style.display="" ;
       }
       function final()
       {
           window.location.href="generate.php" ;
       }