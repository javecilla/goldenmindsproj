//to check fields val
function isEmpty(field) {
  return field === '';
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
 
 //validate selection field
 function validateSelectField(fieldId) {
  var field = $('#' + fieldId);
  var fieldInput = field.val();
  if (fieldInput === 'defaultSelected') {
    field.addClass('is-invalid');
    field.removeClass('is-valid');
  } else {
    field.removeClass('is-invalid');
    field.addClass('');
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
      $('#' + groupId).addClass('');
    }
  });
 }