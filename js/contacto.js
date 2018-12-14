$(document).ready(function(){
  $('#enviar_mensaje').on('submit', function(e){
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.ajax({
      type: $(this).attr('method'), // post, en este caso
      data: datos, // la variable con todos los datos enviados
      url: $(this).attr('action'),// insertar-registro.php
      dataType: 'json', // el formato de los datos que estamos enviando
      success: function(data) { // data, es lo que regresa el archivo enlazado
        var resultado = data;
        console.log(resultado);
        if (resultado.respuesta == 'exito') {
          swal(
            'Mensaje enviado',
            'Te contestaremos a la brevedad',
            'success'
          )
        }else{
          swal(
            'Incorrecto',
            'Hubo un error al enviar el mensaje',
            'error'
          )
        }
      }
    })
    
  });
});
