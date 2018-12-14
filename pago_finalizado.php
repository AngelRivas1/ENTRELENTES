<?php include_once 'includes/templates/header.php';?>
<section class="seccion contenedor-general">
  <h2>Resumen registro</h2>
  <?php
    $resultado = $_GET["exito"];
    $paymentId = $_GET["paymentId"];
    $id_pago = (int) $_GET["id_pago"];

    if ($resultado == "true") {
      echo "El pago se realizo correctamente <br/>";
      echo "El ID es: {$paymentId}";
      require_once('includes/funciones/bd_conexion.php');//se abre conexion con la base de datos
      $stmt = $conn->prepare("UPDATE `envios` SET `estado_pago` = ? WHERE `id_envio` = ? ");
      $pagado = 1;
      $stmt->bind_param("ii", $pagado, $id_pago);//es la cantidad de datos que serán insertados con el prepare
      $stmt->execute();//lo de arriba es el tipo de dato y las variables que serán ingresadas
      $stmt->close();//se cierra el prepare
      $conn->close();//se cierra conexion con la base
    }else{
      echo "El pago no se realizo, igual muchas gracias";
    } ?>
</section>
<?php include_once 'includes/templates/footer.php' ?>
