<?php
  require 'paypal/autoload.php';
  define('URL_SITIO', 'http://localhost:8080/BoilerPlate');
  $apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'Aczn3ivTbWCM52ObeXtTXjsrXK4a_5E-2A489ZKtXmmV7F3VjVzuQy02Vfv_TU4LnM4wQgYT66Phoco3', //cliente id
      'EJHY-NEQf3XGCnArZFsXFcH_OrSUtPrkRgIgDQ4uH8NyR59Glor1elXi_-JdV7XMKWibclyL9RART4Db'
    )
  );
?>
