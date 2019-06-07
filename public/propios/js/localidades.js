$('#EditLocalidad').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var titulo = button.data('titulo')
      var id = button.data('id')
      var departamento = button.data('departamento')
      var nombre = button.data('nombre')
      var coordenadas = button.data('coordenadas')
      var referencia = button.data('referencia')



      var modal = $(this)
      modal.find('.modal-title').text(titulo);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #departamento').val(departamento);
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #coordenadas').val(coordenadas);
      modal.find('.modal-body #referencia').val(referencia);

})

$('#deleteLocalidad').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var id = button.data('id')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})



$(document).ready(function() {

  // on click on submit categories form modal
  $('#CrearLocalidadBtn').unbind('click').bind('click', function() {
    // reset the form text
    $("#formNuevaLocalidad")[0].reset();
    // remove the error text
    $(".text-danger").remove();
    // remove the form error
    $('.form-group').removeClass('has-error').removeClass('has-success');

    // submit categories form function
    $("#formNuevaLocalidad").unbind('submit').bind('submit', function() {

      //$(".text-danger").remove();
      var localidadesName = $("#nombre").val();
      var localidadesDpto = $("#departamento").val();
      var localidadesCoor = $("#coordenadas").val();


      $(".text-danger").remove();
      $('.form-group').removeClass('has-error');

      if(localidadesName == "") {
        $("#nombre").after('<p class="text-danger text-center col-sm-12">Debes ingresar el nombre de la localidad</p>');
        $('#nombre').closest('.form-group').addClass('has-error');
      } else {
        // remov error text field

        // success out for form
        $("#nombre").closest('.form-group').addClass('has-success');
      }

      if(localidadesDpto == "Seleccione") {
        $("#departamento").after('<p class="text-danger text-center col-sm-10">Debes seleccionar un Departamento</p>');
        $('#departamento').closest('.form-group').addClass('has-error');
      } else {

        $("#departamento").closest('.form-group').addClass('has-success');
      }

      if(localidadesCoor == "") {
        $("#coordenadas").after('<p class="text-danger text-center col-sm-10">Debes ingresar la coordenada</p>');
        $('#coordenadas').closest('.form-group').addClass('has-error');
      } else {

        $("#coordenadas").closest('.form-group').addClass('has-success');
      }


      if(localidadesName && localidadesDpto && localidadesCoor) {
        var form = $(this);
        // button loading
        $("#submitNuevo").button('loading');

        $.ajax({
          url : form.attr('action'),
          type: form.attr('method'),
          header:{'X-CSRF-TOKEN': token},
          data: form.serialize(),
          dataType: 'json',
          success:function(response) {
            // button loading
            $("#submitNuevo").button('reset');

            if(response.success == true) {

              // reset the form text
              $("#formNuevaLocalidad")[0].reset();
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

