$(document).ready(function() {

  // on click on submit categories form modal
  $('#cambiarpasswordbtn').unbind('click').bind('click', function() {
    // reset the form text
    $("#cambiarpasswordForm")[0].reset();
    // remove the error text
    $(".text-danger").remove();
    // remove the form error
    $('.form-group').removeClass('has-error').removeClass('has-success');

    // submit categories form function
    $("#cambiarpasswordForm").unbind('submit').bind('submit', function() {

      //$(".text-danger").remove();
      var passwordActual = $("#password_actual").val();
      var password  = $("#password").val();
      var passwordConfirm = $("#password-confirm").val();


      $(".text-danger").remove();
      $('.form-group').removeClass('has-error');

      if(passwordActual == "") {
        $("#password_actual").after('<p class="text-danger text-center col-sm-12">Debes ingresar la contraseña actual</p>');
        $('#password_actual').closest('.form-group').addClass('has-error');
      } else if (passwordActual.length<6)
         {
        $("#password_actual").after('<p class="text-danger text-center col-sm-12">La contraseña debe contener al menos 6 caracteres</p>');
        $('#password_actual').closest('.form-group').addClass('has-error');
        }else {
          // success out for form
          $("#password_actual").closest('.form-group').addClass('has-success');
          var actual = 1;
      }


      if(password == "") {
        $("#password").after('<p class="text-danger text-center col-sm-10">Debes ingresar una nueva contraseña</p>');
        $('#password').closest('.form-group').addClass('has-error');
      } else if (password.length<6)
        {
          $("#password").after('<p class="text-danger text-center col-sm-12">La contraseña debe contener al menos 6 caracteres</p>');
          $('#password').closest('.form-group').addClass('has-error');
        }else if (password == passwordActual)
          {
            $("#password").after('<p class="text-danger text-center col-sm-10">Debes ingresar una contraseña distinta a la anterior</p>');
            $('#password').closest('.form-group').addClass('has-error');
          } else {
            $("#password").after('<p class="text-success text-center col-sm-10">Ingresaste una contraseña válida, no significa que sea la correcta.</p>');
            $("#password").closest('.form-group').addClass('has-success');
            var nuevo = 1;
      }

      if(passwordConfirm == "") {
        $("#password-confirm").after('<p class="text-danger text-center col-sm-10">Debes repetir la contraseña</p>');
        $('#password-confirm').closest('.form-group').addClass('has-error');
      } else if(passwordConfirm.length<6)
        {
          $("#password-confirm").after('<p class="text-danger text-center col-sm-12">La contraseña debe contener al menos 6 caracteres</p>');
          $('#password-confirm').closest('.form-group').addClass('has-error');
        }else if(password == passwordConfirm)
          {
            $("#password-confirm").closest('.form-group').addClass('has-success');
            var confirmado = 1;
          }else {
            $("#password-confirm").after('<p class="text-danger text-center col-sm-10">Las nuevas contraseñas no coinciden.</p>');
            $('#password-confirm').closest('.form-group').addClass('has-error');
      }


      if(actual == 1 && nuevo == 1 && confirmado == 1) {
        var form = $(this);
        // button loading
        $("#submitNuevo").button('loading');

        $.ajax({
          url : form.attr('action'),
          type: form.attr('method'),
          header:{'X-CSRF-TOKEN':token},
          data: form.serialize(),
          dataType: 'json',
          success:function(response) {
            // button loading
            $("#submitNuevo").button('reset');

            if(response.success == true) {

              // reset the form text
              $("#cambiarpasswordForm")[0].reset();
              // remove the error text
              $(".text-danger").remove();
              // remove the form error
              $('.form-group').removeClass('has-error').removeClass('has-success');


              $(".alert-success").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              }); // /.alert
            }  // if
          } // /success
        }); // /ajax
      } // if

      return false;
    }); // submit categories form function
  }); // /on click on submit categories form modal

}); // /document

