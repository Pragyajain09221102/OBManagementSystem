function f9(data){
            console.log(data);
            
//            var settings = {
//  "url": "PrintReciept.php",
//  "method": "POST",
//  "timeout": 0,
//  "headers": {
//    "Content-Type": "application/json"
//  },
//  "data": data
//};
//
//$.ajax(settings).done(function (response) {
////  console.log(response);
//});

$.ajax({
            type: "POST",
            url: 'PrintReciept.php',
            dataType: "json",
            data: {"items": data},
            success: function(response)
            {
            alert("Print success.");
           },
           error:function(error)
            {
           console.log("error", error);
           }
       });
}
