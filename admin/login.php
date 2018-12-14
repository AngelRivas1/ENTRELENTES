<?php
session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if ($cerrar_sesion) {
  session_destroy();
}
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>ENTRE</b>LENTES</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesi&oacute;n</p>
    <form name="login-admin-form" id="login-admin" action="login-admin.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <input type="hidden" name="login-admin" value="1">
          <button name="login-admin" type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesi&oacute;n</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
</body>
<?php include_once 'templates/footer.php' ?>
