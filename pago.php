<?php if(!isset($_POST['submit'])){
  exit("Hubo un error, por favor regresa");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentCard;
require 'includes/paypal.php';



if(isset($_POST['submit'])){
  // DATOS DE LA TARJETA

  $nombre = $_POST['nombre_tarjeta'];
  $apellido = $_POST['apellido_tarjeta'];
  $tarjeta = (int) $_POST['terjeta']; // ESTO NO VA A LA BASE DE DATOS
  $mes_caducidad = (int) $_POST['mes_caducidad']; // ESTO NO VA A LA BASE DE DATOS
  $año_caducidad = (int) $_POST['año_caducidad']; // ESTO NO VA A LA BASE DE DATOS
  $seguridad = (int) $_POST['cvv']; // ESTO NO VA A LA BASE DE DATOS
  $tipo_tarjeta = $_POST['tipo_tarjeta'];

  // INFORMACION DEL ENVIO

  $direccion = $_POST['direccion_casa'];
  $no_direccion = (int) $_POST['numero_casa'];
  $estado = $_POST['estado_casa'];
  $ciudad = $_POST['ciudad_casa'];
  $colonia = $_POST['colonia_casa'];
  $cp = (int) $_POST['cp_casa'];
  $desc = $_POST['descripcion_casa'];
  $fecha = date('Y-m-d H:i:s');

  // INFORMACION SOBRE EL PAGO

  $estado_pago = (int) $_POST['estado_pago'];

  // DATOS DEL LENTE
  $precio = $_POST['precio_lente'];
  $nombre_lente = $_POST['nombre_lente'];
  // include_once 'includes/funciones/funciones.php';
  // $pedido = producto_json($lente);
  try {
    require_once('includes/funciones/connection_db.php');
    $stmt = $conn->prepare("INSERT INTO envios (nombre, apellido, direccion, estado_direccion, numero_direccion, colonia_direccion, cp_direccion, desc_direccion, fecha_pedido, estado_pago) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("ssssisissi", $nombre, $apellido, $direccion, $estado, $no_direccion, $colonia, $cp, $desc, $fecha, $estado_pago);                                                    //es la cantidad de datos que serán insertados con el prepare
    $stmt->execute();//lo de arriba es el tipo de dato y las variables que serán ingresadas
    $ID_registro = $stmt->insert_id;
    $stmt->close();//se cierra el prepare
    $conn->close();//se cierra conexion con la base
  } catch (\Exception $e) {
    $error = $e->getMessage();
  }

}

$compra = new Payer();
$compra->setPaymentMethod('credit_card');

$articulo = new Item();
$articulo->setName($nombre_lente)
          ->setCurrency('MXN')
          ->setQuantity(1)
          ->setPrice($precio);

$arreglo_pedido = array($nombre_lente);

$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

$detalles = new Details();
$detalles->setShipping(0)
         ->setSubTotal($precio);

$total = $precio + 0;

$cantidad = new Amount();
$cantidad->setCurrency('MXN')
         ->setTotal($total)
         ->setDetails($detalles);


$tarjeta = new CreditCard();
$tarjeta->setNumber($tarjeta)
        ->setType($tipo_tarjeta)
        ->setExpireMonth($mes_caducidad)
        ->setExpireYear($año_caducidad)
        ->setCvv2($seguridad)
        ->setFirstName($nombre)
        ->setLastName($apellido)
        ->setBillingAddress($direccion . " " . $no_direccion);

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago ENTRELENTES')
            ->setInvoiceNumber($ID_registro);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&id_pago={$ID_registro}")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false&id_pago={$ID_registro}");

$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

try {
 $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
 echo "<pre>";
 print_r(json_decode($pce->getData()));
 exit;
 echo "</pre>";
}
$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");
?>
