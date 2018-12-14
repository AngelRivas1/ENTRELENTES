$(document).ready(function () {
  $('.sidebar-menu').tree()

  $('#registros').dataTable({
    'paging': true,
    'lengthChange': false,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': false,
    'language': {
      paginate: {
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Último',
        first: 'Primero'
      },
      info: "Mostrando _START_ a _END_ de _TOTAL_ resultados",
      emptyTable: 'No hay registros',
      infoEmpty: '0 registros',
      search: 'Buscar'
    }
  });

  $('#crear_registro_admin').attr('disabled', true);

  $('#repetir_password').on('blur', function(){
    var password_nuevo = $('#password').val();
    if ($(this).val() == password_nuevo) {
      $('#resultado_password').text('Correcto');
      $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('#crear_registro_admin').attr('disabled', false);
    }else{
      $('#resultado_password').text('Incorrecto');
      $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');;
      $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');;
    }
  });
  $('#fecha').datepicker({
    autoclose: true
  })
  $('.timepicker').timepicker({
      showInputs: false
  })
  $('.seleccionar').select2();

  $('#descripcion_lente').attr('disabled', true);
  $('#imagen1_lente').attr('disabled', true);
  $('#imagen2_lente').attr('disabled', true);
  $('#imagen3_lente').attr('disabled', true);

  if ($('#crear_registro_lente').length) {
    $('#descripcion_lente').attr('disabled', false);
    $('#imagen1_lente').attr('disabled', false);
    $('#imagen2_lente').attr('disabled', false);
    $('#imagen3_lente').attr('disabled', false);
  }

$("#cBox_desc").on( 'change', function() {
  if( $(this).is(':checked') ) {
    $('#descripcion_lente').attr('disabled', false);
  } else {
    $('#descripcion_lente').attr('disabled', true);
  }
});
$("#cBox_img1").on( 'change', function() {
  if( $(this).is(':checked') ) {
    $('#imagen1_lente').attr('disabled', false);
  } else {
    $('#imagen1_lente').attr('disabled', true);
  }
});
$("#cBox_img2").on( 'change', function() {
  if( $(this).is(':checked') ) {
    $('#imagen2_lente').attr('disabled', false);
  } else {
    $('#imagen2_lente').attr('disabled', true);
  }
});
$("#cBox_img3").on( 'change', function() {
  if( $(this).is(':checked') ) {
    $('#imagen3_lente').attr('disabled', false);
  } else {
    $('#imagen3_lente').attr('disabled', true);
  }
});

$('#actualizar_registro_lente').on('click', function(){
  $('#descripcion_lente').attr('disabled', false);
  $('#imagen1_lente').attr('disabled', false);
  $('#imagen2_lente').attr('disabled', false);
  $('#imagen3_lente').attr('disabled', false);
  setTimeout(function(){
    window.location.href = 'lista-lentes.php';
  }, 1500);
});
})
