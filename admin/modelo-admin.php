<?php

include_once "funciones/funciones.php";
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];
if ($_POST['registro'] == 'nuevo') { //INICIO-NUEVO
  $opciones = array(
    'cost' => 12
  );
  $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
  try {
    $sql = $conn->prepare(" INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?) ");
    $sql->bind_param('sss', $usuario, $nombre, $password_hashed);
    $sql->execute();
    $id_registro = $sql->insert_id;
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
    die(json_encode($respuesta));
    $sql->close();
    $conn->close();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
// die(json_encode($respuesta));// aqui se regresan valores a ajax
} // FIN-NUEVO

if ($_POST['registro'] == 'actualizar') { // INICIO-ACTUALIZAR
  try {
    if (empty($_POST['password'])) {
      $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ? ");
      $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
    }else{
      $opciones = array(
        'cost'=>12
      );
      $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
      $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ? ");
      $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
    }
    $stmt->execute();
    $id_registro = $conn->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito', // esto tiene que corresponder con la respuesta esperada en AJAX
        'id_actualizado' => $id_registro
      );
    }else{
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
} // FIN-ACTUALIZAR

if ($_POST['registro'] == 'eliminar') {
  $id_borrar = $_POST['id'];
  try {
    $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ? ");
    $stmt->bind_param("i", $id_borrar);
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id_borrar
      );
    }else {
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}// FIN-ELIMINAR


?>
