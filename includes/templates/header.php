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
      <?php
      $archivo = basename($_SERVER["PHP_SELF"]);
      $pagina = str_replace(".php", "", $archivo);
      if ($pagina == 'comprar-item') {
        echo " ";
      }else{
        echo "<link rel='stylesheet' href='css/fancy-inputs-buttons.css'>";
      }
      ?>
      <link href="https://fonts.googleapis.com/css?family=Lato:400,900i|Montserrat:300,400,700|Open+Sans+Condensed:300,700" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
      <link rel="stylesheet" href="css/styles.css">
      <meta name="viewport" content="width=device-width, user-scalable=no">
  </head>
  <body data-spy="scroll">
     <div class="navegacion-lateral">
       <!-- <i id="close-nav" class="fa fa-times"></i> -->
       <ul id="menu-nav">
         <li><a href="index.php">Inicio</a></li>
         <li><a href="ellos.php">Para ellos</a></li>
         <li><a href="ellas.php">Para ellas</a></li>
         <li><a href="#">Pru&eacute;batelos</a></li>
         <li><a href="contacto.php">Contacto</a></li>
         <li><a href="FAQ.php">Preguntas frecuentes</a></li>
      </ul>
    </div>

    <a id="carro" href="carrito.php"><i class="fa fa-cart"></i></a>

    <?php
      if ($pagina == 'ellas') {
        include_once 'nav-ellas.php';
      }else if($pagina == 'ellos'){
        include_once 'nav-ellos.php';
      }else{
        include_once 'nav-ellos.php';
      }
    ?>
