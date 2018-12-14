<?php

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

echo $correo. " " . $asunto . " " . $mensaje;


try {
  require_once('includes/funciones/connection_db.php');
  $stmt = $conn->prepare("INSERT INTO mensajes (correo_contacto, asunto_contacto, mensaje_contacto) VALUES (?, ?, ?) ");
  $stmt->bind_param('sss', $correo, $asunto, $mensaje);
  $stmt->execute();
  $id_registro = $stmt->insert_id;
  if ($id_registro > 0) {
    $respuesta = array(
      'respuesta' => 'exito',
      'id_admin' => $id_registro
    );
  }else{
    // $respuesta = array( 'respuesta' => 'error: '.$conn->error );
    $respuesta = array(
      'respuesta' => 'error'
    );
  }
  $stmt->close();
  $conn->close();
} catch (\Exception $e) {
  echo "Error: " . $e->getMessage();
}


 ?>
