<?php
function usuario_autenticado(){
  if (!revisar_ususario()) {
    header('Location:login.php');
    exit();
  }
}

function revisar_ususario(){
  return isset($_SESSION['usuario']);
}
session_start();
usuario_autenticado();
?>
