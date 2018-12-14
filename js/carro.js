$(document).ready(function(){
  var cantidad = $('input[type=number]');
  var eliminarItem = $('#elminarItem');
  // var cantidadDeLentes = $('input ').val();
  // console.log(cantidadDeLentes);
  cantidad.bind('keyup mouseup', function(e){
    if ($(this).val() != '') {
      var id = $(this).attr('data-id');
      var precio = $(this).attr('data-precio');
      var cantidad = $(this).val();

      $(this).parentsUntil('.item-carro').find('.subtotal').text('Subtotal: ' + (precio * cantidad));
      $.ajax({
        type: 'POST',
        data: {
          Id: id,
          Precio: precio,
          Cantidad: cantidad
        },
        url: 'actualizarTotal.php',
        dataType: 'json',
        success: function(data){
          var resultado = data;
          console.log(resultado);
          $('#total').text('Total: $ ' + data);
        }
      })
    }
  });

  eliminarItem.on("click", function(){
    console.log("click");
    $(this).parentsUntil(".item-carro").hide();
  });

});
