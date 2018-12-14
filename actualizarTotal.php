<?php
session_start();

$id = $_POST['Id'];
$precio = $_POST['Precio'];
$cantidad = $_POST['Cantidad'];

$arreglo = $_SESSION['carrito'];
$total = 0;
$numero = 0;
for ($i = 0; $i < count($arreglo); $i++) {
  if ($arreglo[$i]['Id'] == $id) {
    $numero = $i;
  }
}
$arreglo[$numero]['Cantidad'] = $cantidad;
for ($i = 0; $i < count($arreglo); $i++) {
  $total += + ($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);
}
$_SESSION['carrito'] = $arreglo;
die(json_encode($total));

?>
