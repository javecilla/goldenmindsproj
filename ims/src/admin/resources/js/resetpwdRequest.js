   window.onload = function() {
      var emailInput = document.getElementById("email");
      emailInput.focus();
   }

    //Hide and show password
   $(document).ready(function() {
       $("#show_hide_password a").on('click', function(event) {
           event.preventDefault();
           if($('#show_hide_password input').attr("type") == "text"){
               $('#show_hide_password input').attr('type', 'password');
               $('#show_hide_password i').addClass( "fa-eye-slash" );
               $('#show_hide_password i').removeClass( "fa-eye" );
           } else if($('#show_hide_password input').attr("type") == "password"){
               $('#show_hide_password input').attr('type', 'text');
               $('#show_hide_password i').removeClass( "fa-eye-slash" );
               $('#show_hide_password i').addClass( "fa-eye" );
           }
       });
   });

   //prevent viewing source code
   document.onkeydown = function(e) {
      if(e.keyCode == 123) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
         return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
         return false;
      }      
   }