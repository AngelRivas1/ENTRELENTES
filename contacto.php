<?php require_once("includes/templates/header.php"); ?>

<div class="hero-size divisor-flecha ellos elemento-inicio">
  <div class="hero">
    <div class="hero-content">
      <div class="">
        <h2 class="text-center">CONTACTO</h2>
      </div>
    </div><!-- .hero-content -->
  </div><!-- .hero -->
</div><!-- .hero-size -->

<div class="container-fluid" style="margin-top: 50px">
  <div class="row">
    <div class="col-sm-12"><h2>Cont&aacute;ctanos</h2></div>
    <div class="col-sm-12">
      <div class="mapa-ph">

      </div>
    </div><!-- Columna del mapa -->
    <form action="mensaje.php" method="post" id="enviar_mensaje">
      <div class="form-row">
        <div class="col-sm-12">
          <input type="email" name="correo" class="form-control" placeholder="correo">
        </div>
        <div class="col-sm-12">
          <input type="text" name="asunto" class="form-control" placeholder="asunto">
        </div>
        <div class="col-sm-12">
          <input type="textarea" name="mensaje" class="form-control" placeholder="mensaje">
        </div>
        <div class="col-sm-12">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
        </div>
      </div>
    </form>

  </div>
</div>

<?php require_once("includes/templates/footer.php"); ?>
