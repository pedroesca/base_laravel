


  $('#deleteCliente').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var id = button.data('id')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
    })


