

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRELENTES - &oacute;ptica mexicana</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fancy-inputs-buttons.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
  </head>
  <body>
    <div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="padding:0;">
            <div class="jumbotron text-center" data-bs-parallax-bg="true" style="background-image:url(&quot;img/TEST.png&quot;);background-position:bottom;background-size:cover;background-repeat:no-repeat;margin:0;padding:150px 0 150px 0;">
              <p style="color:rgb(222,209,186);">ENTRELENTES</p>
              <h1 style="padding:40px 0;color:rgb(222,209,186);">EL MEJOR, NO DE LOS MEJORES</h1>
              <p><a href="ellos.php" class="bttn-2">COMPRAR</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="brands" style="padding:30px 0;"><a href="#"> <img src="img/instacart.png"><img src="img/kickstarter.png"><img src="img/lyft.png"><img src="img/shopify.png"><img src="img/pinterest.png"><img src="img/twitter.png"></a></div>
    <div>
      <div class="container-fluid" style="background-color:rgb(222,209,186);">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 style="padding: 45px 0 40px 0; margin: 0;" class="fancy h1"><span>NUESTROS COMETIDOS</span></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <figure class="figure">
              <img class="img-fluid figure-img" src="img/22744.png" style="width:324px;">
              <figcaption class="figure-caption">Caption</figcaption>
            </figure>
          </div>
          <div class="col-md-6 text-center">
            <figure class="figure">
              <img class="img-fluid figure-img" src="img/22744.png" style="width:324px;">
              <figcaption class="figure-caption">Caption</figcaption>
            </figure>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="container-fluid" style="background-color:rgb(28,219,173);height:auto;">
        <div class="row">
          <div class="col-sm-12 col-md-6 align-self-center text-center" style="background-color:rgb(28,219,173);color:rgb(222,209,186);padding:0 40px;">
            <p style="font-size:1.6em;"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget cursus lacus, eu dignissim purus.<br></p>
            <a href="index.html" class="bttn-2">VER MÁS</a>
          </div>
          <div class="col-sm-12 col-md-6" style="background-image:url(&quot;img/_MG_9986.jpg&quot;);background-position:bottom;background-size:cover;background-repeat:no-repeat;height:450px;"></div>
          <div class="col-sm-12 col-md-6" style="background-image:url(&quot;img/IMG_5439.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;height:450px;"></div>
          <div class="col-sm-12 col-md-6 align-self-center text-center" style="background-color:rgb(28,219,173);color:rgb(222,209,186);padding:0 40px;">
            <p style="font-size:1.6em;"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget cursus lacus, eu dignissim purus.<br></p>
            <a href="index.html" class="bttn-2">COMPRAR</a>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="container-fluid" style="background-color:rgb(222,209,186);">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 style="padding: 45px 0 40px 0; margin: 0;" class="fancy h1"><span>&Uacute;LTIMOS MODELOS</span></h1>
          </div>
        </div>
        <div class="row">
          <?php
            try {
              require_once('includes/funciones/connection_db.php');
              $sql = "SELECT * FROM lentes_normales ORDER BY id_lente DESC LIMIT 3";
              $resultado = $conn->query($sql);
            } catch (\Exception $e) {
              echo $e->getMessage();
            }
              while ($lente = $resultado->fetch_assoc()){
            ?>
          <div class="col-md-4">
            <figure class="figure">
              <a href="item.php?id=<?php echo $lente['id_lente']; ?>">
              <img src="img/<?php echo $lente['img1_lente']; ?>" class="img-fluid figure-img item-glass" />
              </a>
              <figcaption class="figure-caption name-glass">
                <div class="c--anim-btn"><span class="c-anim-btn"><?php echo $lente['nombre_lente']; ?></span><span><a href="item-1.html" class="underlined"><?php echo $lente['nombre_lente']; ?></a></span></div>
              </figcaption>
            </figure>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 text-center" style="padding:60px 0;background-color:rgb(28,219,173);"><a href="index.html" class="bttn-2">COMPRAR AHORA</a></div>
        </div>
      </div>
    </div>
    <div data-bs-parallax-bg="true" class="newsletter-subscribe" style="background-image:url(&quot;img/stuff.png&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;">
      <div class="container" style="color:rgb(222,209,186);">
        <div class="intro">
          <h1 class="text-center">NEWSLETTER</h1>
          <p class="text-center" style="color:rgb(222,209,186);margin:0;padding:35px 0;">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
        </div>
        <form class="form-inline" method="post">
          <div class="form-group">
            <div class="group">
              <input class="form-control campo-form" type="email" name="correo" required="" maxlength="30" minlength="5" autocomplete="on" inputmode="email">
              <span class="highlight"></span>
              <span class="bar__"></span>
              <label>Correo</label>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-outline-primary btn-block button" type="submit" style="background-color:transparent;color:rgb(222,209,186);">SubscribeTE</button>
          </div>
        </form>
      </div>
    </div>
    <div class="social-icons" style="padding:40px 0;background-color:rgb(222,209,186);"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="js/mensaje-contacto.js"></script>
    <script src="js/Simple-Slider.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/social-media.js"></script>
  </body>
</html>
