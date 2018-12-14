$(document).ready(function(){
  $('#login-admin').on('submit', function(e){
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
        if (resultado.respuesta == 'exitoso') {
          swal(
            'Login correcto',
            'Bienvenido '+resultado.usuario+'!!',
            'success'
          )
          setTimeout(function(){
            window.location.href = 'admin-area.php';
          }, 2000);
        }else{
          swal(
            'Incorrecto',
            'Usuario o password incorrectos',
            'error'
          )
        }
      }
    })
  });
});
