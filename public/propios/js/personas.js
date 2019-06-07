
$(document).ready(function() {


  $('#dataTable').DataTable(
  {
    "responsive": true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }
  );

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

  $('#deleteVinculo').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var titulo = button.data('titulo')
    console.log(id);

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-title').text(titulo);
  })

  $('#formModal').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      $("#formNuevaPersona")[0].reset();
      var button = $(event.relatedTarget)
      var idsus = button.data('idsus')
      var titulo = button.data('titulo')
      console.log(idsus);
      var modal = $(this)
      modal.find('.modal-body #idsus').val(idsus);
      modal.find('.modal-title').text(titulo);
        // remove the error text
        $(".text-danger").remove();
        // remove the form error
        $('.form-group').removeClass('has-error').removeClass('has-success');
    })

  $('#formDesvincular').on('submit', function(event){
    event.preventDefault();
     $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            method: 'post',
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
             var html = '';
             if(data.success)
             {
              //console.log('entra success');
              html = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.success + '</div>';
              $('#form_result').html(html);
              $('#deleteVinculo').modal('hide');
             }
            }

           })
  });


  $('#formVincular').on('submit', function(event){
     event.preventDefault();
     $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            method: 'post',
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
             var html = '';
             if(data.success)
             {
              //console.log('entra success');
              html = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.success + '</div>';
              $('#form_result').html(html);
             }
            }

           })

  });

  $('#formNuevaPersona').on('submit', function(event){
    event.preventDefault();
     if($('#submitNuevo').val() == 'add')
  {

     //$(".text-danger").remove();
      var personaApellido = $("#apellido").val();
      var personaNombre = $("#nombre").val();



      $(".text-danger").remove();
      $('.form-group').removeClass('has-error');


      if(personaApellido == "") {
        $("#apellido").after('<p class="text-danger text-center col-sm-10">Tenes que escribir el apellido de la persona</p>');
        $('#apellido').closest('.form-group').addClass('has-error');
      } else {

        $("#apellido").closest('.form-group').addClass('has-success');
      }

      if(personaNombre == "") {
        $("#nombre").after('<p class="text-danger text-center col-sm-10">Tenes que escribir el nombre de la persona</p>');
        $('#nombre').closest('.form-group').addClass('has-error');
      } else {

        $("#nombre").closest('.form-group').addClass('has-success');
      }



      if(personaApellido && personaNombre) {
        $("#submitNuevo").button('loading');
           $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
             var html = '';
             if(data.errors)
             {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
               html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
             }
             if(data.success)
             {
              //console.log('entra success');
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $("#submitNuevo").button('reset');
              $("#formNuevaPersona")[0].reset();
              $('#dataTable').DataTable().api().ajax.reload();
               // remove the error text
              $(".text-danger").remove();
              // remove the form error
              $('.form-group').removeClass('has-error').removeClass('has-success');
             }
             $('#form_result').html(html);
             $('#formModal').modal('hide');
            }

           })
         }
  }
  })


});

