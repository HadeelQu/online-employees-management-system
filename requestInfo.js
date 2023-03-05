
var script = document.createElement('script');
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js";
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script)



function Editreq(id) {
  //go to edit page
  window.location.href = "edit.php?id=" + id;
}

function approveReq(id) {
     $.ajax({    
        
  url:"updataRequest.php",
  type:"POST",
  data:{rid:id,status:"Approved"},
  dataType:"text",

 success: function(result){
     // $("#"+id).html(result);
    
        
           // $("#"+id).removeClass("Approve");
           // $("#"+id).addClass("Decline");
         $("#s"+id).html("Approved");
               $("#"+id).html('<input class="Decline" type="button" value="Decline" onClick="declineReq('+id+')">');
               
             $("#c"+id).attr('style', "background-color: white;font-style: normal;");
          //if(isInProgress){
             // $("#c"+id).html('<tr id="c'+id+'"'+style="background-color: rgba(255, 255, 255, 0.2); ;font-style: italic;");
                       //rgba(148, 145, 145, 0.075); 
                       
         // }
      
  }
  
});
//window.location.href = "request-information-page.php?id=" + id + "&action=approve";
}

function declineReq(id) {
    
         $.ajax({    
        
   url:"updataRequest.php",
  type:"POST",
  data:{rid:id,status:"Decline"},
  dataType:"text",

 success: function(result){
      console.log("hi");
    console.log(result);
     // $("#"+id).html(result);
     $("#s"+id).html("Decline");
     
          
         
          $("#"+id).html('<input class="Approve" type="button" value="Approve" onClick="approveReq('+id+')">');
             $("#c"+id).attr('style', "background-color: white;font-style: normal;");
         // if(isInProgress){
              //$("#c"+id).html('<tr id="c'+id+'"'+style="background-color: rgba(148, 145, 145, 0.075); ;font-style: italic;");
                       //rgba(148, 145, 145, 0.075); 
                       
          //}
          
        
           
      
      
  }
  
});
 
}



function Hover(id){

 $.ajax({
          type: "POST",
          url: "HoverManger.php",
          data: "RequestID="+id,
          success: function(response){

     
     var JsonText=JSON.stringify(response);
   
     var JObject= JSON.parse(JsonText);
  
      $(".Title").attr('title', JObject.description);

      }
      });

     
}
