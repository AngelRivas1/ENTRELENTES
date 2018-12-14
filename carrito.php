<?php include_once "includes/templates/header.php"; ?>
<?php
session_start();
require_once('includes/funciones/connection_db.php');
$id = $_GET['id'];
if (isset($_SESSION['carrito'])) {
	if (isset($_GET['id'])) {
		$arreglo = $_SESSION['carrito'];
		$encontro = false;
		$numero = 0;
		for ($i = 0; $i < count($arreglo); $i++) {
			if ($arreglo[$i]['Id'] == $_GET['id']) {
				$encontro = true;
				$numero = $i;
			}
		}

		if ($encontro == true) {
			$arreglo[$numero]['Cantidad'] = 1;
			$_SESSION['carrito'] = $arreglo;
		}
		else {
      $sql = "SELECT * FROM lentes_normales WHERE `id_lente` = {$id}";
      $resultado = $conn->query($sql);
			while ($lente = $resultado->fetch_array()) {
				$nombre = $lente['nombre_lente'];
				$precio = $lente['precio_lente'];
				$imagen = $lente['img1_lente'];
			}

			$datosNuevos = array(
				'Id' => $_GET['id'],
				'Nombre' => $nombre,
				'Precio' => $precio,
				'Imagen' => $imagen,
				'Cantidad' => 1
			);
			array_push($arreglo, $datosNuevos);
			$_SESSION['carrito'] = $arreglo;
		}
	}
}
else {
	if (isset($_GET['id'])) {
    $sql = "SELECT * FROM lentes_normales WHERE `id_lente` = {$id}";
    $resultado = $conn->query($sql);
    while ($lente = $resultado->fetch_array()) {
      $nombre = $lente['nombre_lente'];
      $precio = $lente['precio_lente'];
      $imagen = $lente['img1_lente'];
    }

		$arreglo[] = array(
			'Id' => $_GET['id'],
			'Nombre' => $nombre,
			'Precio' => $precio,
			'Imagen' => $imagen,
			'Cantidad' => 1
		);
		$_SESSION['carrito'] = $arreglo;
	}
}
 ?>


<div class="container elemento-inicio">
  <div class="row">
    <div class="col-sm-12">
      <h2>Carro de compras</h2>
    </div>
		<form class="form w-100" action="comprar-item.php" method="post">
    <?php
      if (isset($_SESSION['carrito'])) {
        $datos = $_SESSION['carrito'];
        for ($i=0; $i < count($datos); $i++) { ?>
          <div class="row item-carro">
            <div class="col-sm-12 col-md-3">
              <img class="img img-fluid" src="img/<?php echo $datos[$i]['Imagen']; ?>" alt="Lente <?php echo $datos[$i]['Nombre']; ?>">
            </div>
            <div class="col-sm-12 col-md-2">
              <h3><?php echo $datos[$i]['Nombre']; ?></h3>
            </div>
            <div class="col-sm-12 col-md-3">
              <h3 class=>$<?php echo $datos[$i]['Precio']; ?></h3>
            </div>
            <div class="col-sm-12 col-md-3">
              <input type="number" class="form-control detalles" min="0" name="cantidad[]"
                     value="<?php echo $datos[$i]['Cantidad']; ?>"
                     data-precio="<?php echo $datos[$i]['Precio']; ?>"
                     data-cantidad="<?php echo $datos[$i]['Cantidad']; ?>"
                     data-id="<?php echo $datos[$i]['Id']; ?>">
            </div>
						<div class="col-sm-12 col-md-1">
							<h2 id="elminarItem">&times;</h2>
							<!-- <svg>
								<g>

								</g>
							</svg> -->
						</div>
						<input type="number" class="id_item_compra d-none" name="id_compra[]" value="<?php echo $datos[$i]['Id']; ?>">
          </div>
    <?php
          $total += ($datos[$i]['Cantidad']*$datos[$i]['Precio']);
        }
      }else{
        echo "<div class='col-sm-12' id='carro-vacio'>
								<h2>No hay nada en el carro</h2>
								<p>Busca los que te gusten, aquí podras iniciar el pago. :^)</p>
							</div>";
      }
			if (isset($total)) {
				echo "<div class='col-sm-12'><h2 id='total'>Total: $ " . $total . "</h2></div>";
				echo "<div class='col-sm-4 offset-sm-8 text-right contaier-element'>
								<input type='submit' class='btn bttn' id='pagar_carrito' value='Pagar'/>
								<input type='hidden' name='total' value=". $total .">
							</div>";
			}?>
		</form>
	</div>
</div>


<?php include_once "includes/templates/footer.php"; ?>
