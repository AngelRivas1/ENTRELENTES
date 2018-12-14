$(document).ready(function(){
  $('#guardar-registro').on('submit', function(e){
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr('method'), // post, en este caso
      data: datos, // la variable con todos los datos enviados
      url: $(this).attr('action'),
      dataType: 'json', // el formato de los datos que estamos enviando
      success: function(data) { // data, es lo que regresa el archivo enlazado
        console.log(data);
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          swal(
            'Correcto',
            'Se guardó correctamente',
            'success'
          )
        }else{
          swal(
            'Incorrecto',
            'Hubo un error al crear el administrador',
            'error'
          )
        }
      }
    })
  });

  // eliminar un registro

  $('.borrar_registro').on('click', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    swal({
      title: '¿Estás seguro?',
      text: "Un registro eliminado no se puede recuperar",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result)=> {
      if (result.value) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'registro': 'eliminar'
          },
          url: 'modelo-'+tipo+'.php',
          success: function(data){
            var resultado = JSON.parse(data);
            console.log(data);
            if (resultado.respuesta == 'exito') {
              swal(
                'Eliminado!',
                'El registro ha sido eliminado',
                'success'
              )
              jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
            }else{
              swal(
                'Error',
                'No se pudo eliminar',
                'error'
              )
            }
          }
        })
      }
    });
  });

});
