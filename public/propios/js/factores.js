$('#EditFactor').on('show.bs.modal', function (event){
      //console.log('MODAL CEFactor');
      var button = $(event.relatedTarget)
      var titulo = button.data('titulo')
      var id = button.data('id')
      var factor = button.data('factor')
      var descripcion = button.data('descripcion')



      var modal = $(this)
      modal.find('.modal-title').text(titulo);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #factor').val(factor);
      modal.find('.modal-body #descripcion').val(descripcion);

})

  $('#deleteFactor').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var id = button.data('id')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
    })



$(document).ready(function() {

  // on click on submit categories form modal
  $('#CrearFactorBtn').unbind('click').bind('click', function() {
    // reset the form text
    $("#formNuevoFactor")[0].reset();
    // remove the error text
    $(".text-danger").remove();
    // remove the form error
    $('.form-group').removeClass('has-error').removeClass('has-success');

    // submit categories form function
    $("#formNuevoFactor").unbind('submit').bind('submit', function() {

      //$(".text-danger").remove();
      var factorNombre = $("#factor").val();
      var factorDescripcion = $("#descripcion").val();



      $(".text-danger").remove();
      $('.form-group').removeClass('has-error');


      if(factorNombre == "") {
        $("#factor").after('<p class="text-danger text-center col-sm-10">Tenes que escribir el nombre del factor</p>');
        $('#factor').closest('.form-group').addClass('has-error');
      } else {

        $("#factor").closest('.form-group').addClass('has-success');
      }


      if(factorNombre) {
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
              $("#formNuevoFactor")[0].reset();
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

