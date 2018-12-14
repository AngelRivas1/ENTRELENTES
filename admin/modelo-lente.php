<?php

include_once "funciones/funciones.php";
$nombre_lente = $_POST['nombre_lente'];
$cat_lente = $_POST['cat_lente'];//esta es la categoria nueva de lentes
$desc_lente = $_POST['descripcion_lente'];
$precio_lente = $_POST['precio_lente'];
$cant_lente = $_POST['stock_lente'];
$img1_lente = $_POST['imagen1_lente'];
$img2_lente = $_POST['imagen2_lente'];
$img3_lente = $_POST['imagen3_lente'];
$id_lente = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') { //INICIO-NUEVO
  try {
    $sql = $conn->prepare(" INSERT INTO lentes_normales (categoria, nombre_lente, desc_lente, precio_lente, cant_lente, img1_lente, img2_lente, img3_lente) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
    $sql->bind_param('sssiisss', $cat_lente, $nombre_lente, $desc_lente, $precio_lente, $cant_lente, $img1_lente, $img2_lente, $img3_lente);
    $sql->execute();
    $id_registro = $sql->insert_id;
    if ($id_registro > 0) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_resgitro' => $id_registro
      );
    }else{
      $respuesta = array(
        'respuesta' => 'error: '.$conn->error
      );
    }
    $sql->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => "Error: " . $e->getMessage()
    );

  }
 die(json_encode($respuesta));// aqui se regresan valores a ajax
} // FIN-NUEVO

if ($_POST['registro'] == 'actualizar') { // INICIO-ACTUALIZAR
  // die(json_encode($_POST));
  try {
    $stmt = $conn->prepare("UPDATE lentes_normales SET nombre_lente = ?, desc_lente = ?, precio_lente = ?, cant_lente = ?, img1_lente = ?, img2_lente = ?, img3_lente = ? WHERE id_lente = ? ");
    $stmt->bind_param("ssiisssi", $nombre_lente, $desc_lente, $precio_lente, $cant_lente, $img1_lente, $img2_lente, $img3_lente, $id_lente);
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito', // esto tiene que corresponder con la respuesta esperada en AJAX
        'id_actualizado' => $id_lente
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
    $stmt = $conn->prepare(" DELETE FROM lentes_normales WHERE id_lente = ? ");
    $stmt->bind_param("i", $id_borrar);
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id_borrar
      );
    }else{
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
  }catch (Exception $e){
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}// FIN-ELIMINAR


?>
