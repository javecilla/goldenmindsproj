//prevent history back
function preventBack() {
  window.history.forward(); 
}
setTimeout("preventBack()", 0); //set timeout 0 milliseconds deley
window.onunload = function(){null}; 


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

//to check fields val
function isEmpty(field) {
 return field === '';
}

//check email
function validateEmail(emailId, msgId) {
 $(emailId).keyup(function() {
   var email = $(this).val();
   var regx_email = /^([a-zA-z]+)([0-9]+)?(@)([a-zA-Z]{5,10}(.)([a-zA-Z]+))$/i;
   if(!regx_email.test(email)) {
     $(emailId).addClass('is-invalid');
     $(emailId).removeClass('is-valid'); // remove is-valid class
     $(msgId).addClass('text-danger');
     $(msgId).text('Invalid, email should be "sample@gmail.com".');
   } else {
     $(emailId).removeClass('is-invalid'); // remove is-invalid class
     $(emailId).addClass('is-valid');
     $(msgId).removeClass('text-danger');
     $(msgId).text('');
   }
 });
}

//validate input onkeyup
function validateInput(input, errorMsg) {
  input.keyup(function() {
     var inputVal = $(this).val();
     if(inputVal === '') {
        input.addClass('is-invalid');
        input.removeClass('is-valid');
        errorMsg.addClass('text-danger');
        errorMsg.text('This field is required.');
     } else {
        input.removeClass('is-invalid');
        input.addClass('is-valid');
        errorMsg.removeClass('text-danger');
        errorMsg.text('');
     }
  });
}

//============Qualification==================>

//radio selection
const radioGroups = document.querySelectorAll('.radio-group');
radioGroups.forEach(group => {
  group.addEventListener('click', event => {
     const inputId = event.target.closest('.radio-group').dataset.inputId;
     const radioValue = event.target.value;
     const inputElement = document.getElementById(inputId);
     inputElement.value = radioValue;
  });
});

//reset all form
function resetForm(formId) {
 const form = document.getElementById(formId);
 if(form) {
     form.reset();
     $(form).find('.is-invalid').removeClass('is-invalid');
     $(form).find('.is-valid').removeClass('is-valid');
 }
}

//back to signin
function cancel(url) { 
  Swal.fire({
     title: "Confirm",
     text: "You are about to leave this page.",
     icon: "info",
     customClass: 'swal-wide',
     confirmButtonText: "Leave",
     confirmButtonColor: "#149ddd",
     showCancelButton: true,
     cancelButtonText: "Cancel",
     allowEscapeKey : false,
     allowOutsideClick: false
  }).then((response) => {
     if(response.isConfirmed) {
        $.ajax({
           method: "POST",
           url: "api/data.php",
           data: { cancelReg: true },
           success: function(response) {
              //window.location.replace('signin');
              // window.history.go(-2);
              window.location.href= 'signin';
           }
        });
     }
  });
}

//validate selection field
function validateSelectField(fieldId) {
 var field = $('#' + fieldId);
 var fieldInput = field.val();
 if (fieldInput === 'defaultSelected') {
   field.addClass('is-invalid');
   field.removeClass('is-valid');
 } else {
   field.removeClass('is-invalid');
   field.addClass('is-valid');
 }
}

//validate all radio field
function validateRadioInput(groupId, inputName) {
 $('#' + groupId).on('change', 'input[name="' + inputName + '"]', function() {
   var inputValue = $('input[name="' + inputName + '"]:checked').val();
   if(inputValue === '' || inputValue === undefined) {
     $('#' + groupId).addClass('is-invalid');
     $('#' + groupId).removeClass('is-valid');
   } else {
     $('#' + groupId).removeClass('is-invalid');
     $('#' + groupId).addClass('is-valid');
   }
 });
}


//============Preregister==================>

//check url, then show applicant is set
var queryParams = new URLSearchParams(window.location.search);
var modeParam = queryParams.get('mode');
if(modeParam === 'create_acct') {
  $('.applicant').hide();
} else {
  $('.applicant').show();
}

//auto calculate age
function calculateAge(dobInput, ageOutput) {
  $(dobInput).on('change', function() {
     var dob = new Date($(this).val());
     var today = new Date();
     var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
     $(ageOutput).text('Age: ' + age);
  });
}  

//onchange photo
function readURL(input) {
  if(input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0].name);
     };
     reader.readAsDataURL(input.files[0]);
  } else {
     removeUpload();
  }
}
//to remove selected photo
function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
//drag and drop down photo
$('.image-upload-wrap').bind('dragover', function () {
  $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
  $('.image-upload-wrap').removeClass('image-dropping');
});