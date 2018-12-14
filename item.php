<?php require_once("includes/templates/header.php"); ?>
<?php
  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }
    try {
      require_once('includes/funciones/connection_db.php');
      $sql = "SELECT * FROM lentes_normales WHERE `id_lente` = {$id}";
      $resultado = $conn->query($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }

    $lente = $resultado->fetch_array();
   ?>
<div class="simple-slider" id="carousel_1">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div id="img_lente_1" class="swiper-slide" style="background-image:url('img/<?php echo $lente['img1_lente'] ?>');background-position:center;background-size:cover;"></div>
      <div id="img_lente_2" class="swiper-slide" style="background-image:url('img/_MG_9994.jpg');background-position:center;background-size:cover;"></div>
      <div id="img_lente_3" class="swiper-slide" style="background-image:url('img/_MG_9997.jpg');background-position:center;background-size:cover;"></div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div>

<div class="simple-slider" id="carousel_2">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div id="img_lente_1" class="swiper-slide" style="background-image:url('img/<?php echo $lente['img1_lente'] ?>');background-position:center;background-size:cover;"></div>
      <div id="img_lente_2" class="swiper-slide" style="background-image:url('img/_MG_9994.jpg');background-position:center;background-size:cover;"></div>
      <div id="img_lente_3" class="swiper-slide" style="background-image:url('img/_MG_9997.jpg');background-position:center;background-size:cover;"></div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div>

<div class="simple-slider" id="carousel_3">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div id="img_lente_1" class="swiper-slide" style="background-image:url('img/<?php echo $lente['img1_lente'] ?>');background-position:center;background-size:cover;"></div>
      <div id="img_lente_2" class="swiper-slide" style="background-image:url('img/_MG_9994.jpg');background-position:center;background-size:cover;"></div>
      <div id="img_lente_3" class="swiper-slide" style="background-image:url('img/_MG_9997.jpg');background-position:center;background-size:cover;"></div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div>
<div class="submodelos">
  <ul>
    <li id="modelo_1">
      <img src="https://picsum.photos/20/20" alt="placeholder">
    </li>
    <li id="modelo_2">
      <img src="https://picsum.photos/20/20" alt="placeholder">
    </li>
    <li id="modelo_3">
      <img src="https://picsum.photos/20/20" alt="placeholder">
    </li>
  </ul>
</div>
<div class="container">
  <div class="row" style="padding-bottom:30px;padding-top:15px;">
    <div class="col-md-12">
      <h1><?php echo $lente["nombre_lente"] ?></h1>
    </div>
    <div class="col-md-6">
      <p><?php echo $lente["desc_lente"] ?></p>
      <h5>Disponibles: <?php echo $lente['cant_lente']; ?></h5>
      <span class="text-muted">Esto es un estimado, la disponibilidad puede cambiar sin previo aviso</span>
    </div>
    <div class="col-md-6 text-left">
      <div class="row">
        <div class="col-sm-12">
          <div class="select_mate" data-mate-select="active" >
            <select name="" onchange="" onclick="return false;" id="">
              <option value=""  >Seleciona una Opcion </option>
              <option value="1">Select option 1</option>
              <option value="2" >Select option 2</option>
              <option value="3">Select option 3</option>
            </select>
            <p class="selecionado_opcion"  onclick="open_select(this)" ></p>
            <span onclick="open_select(this)" class="icon_select_mate" >
              <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
                <path d="M0-.75h24v24H0z" fill="none"/>
              </svg>
            </span>
            <div class="cont_list_select_mate">
              <ul class="cont_select_int">  </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <input type="radio" name="test" value="si_graduacion">Hola <br>
          <input type="radio" name="test" value="no_graduacion">Mundo <br>
        </div>
      </div>
      <!-- Custom select structure -->


    </div>
    <div class="col-sm-12 col-md-6 offset-md-6 align-self-end clearfix">
      <a class="btn btn-outline-info btn-lg" href="comprar-item.php?id=<?php echo $id ?>">Comprar &nbsp;<i class="fas fa-dollar-sign" style="font-size:20px;"></i></a>
      <a class="btn btn-outline-dark btn-lg" href="carrito.php?id=<?php echo $id ?>">Agregar al carrito &nbsp;<i class="fas fa-shopping-cart" style="font-size:20px;"></i></a>
      <a mp-mode="dftl" href="https://www.mercadopago.com/mlm/checkout/start?pref_id=363079750-84fa83e3-74bd-4d41-b9e1-8d0a9bd4589d" name="MP-payButton" class='blue-ar-l-rn-none'>Pagar</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
    </div>
  </div>
</div>
<?php $conn->close(); ?>
<?php require_once("includes/templates/footer.php"); ?>
