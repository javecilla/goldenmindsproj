    //focus on email iput
   window.onload = function() {
      var emailInput = document.getElementById("email");
      emailInput.focus();
   }

   //defined all otp input
   const otpInputs = document.querySelectorAll('.otp_field');
   
    //Focus on the next input when current input is filled
    otpInputs.forEach((input, index) => {
        otpInputs[0].focus();  //focus on first input
        input.addEventListener('input', (e) => {
            if (input.value.length === 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                } else {
                    input.blur();
                }
            }
        });
        //Delete the value of the previous input when backspace is pressed
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value.length === 0) {
                if (index > 0) {
                    otpInputs[index - 1].value = '';
                    otpInputs[index - 1].focus();
                }
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
