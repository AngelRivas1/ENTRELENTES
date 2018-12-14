<?php include_once "includes/templates/header.php"; ?>
<div class="container" id="resumenDeCompra" style="margin-top: 50px;">
  <div class="row">
    <div class="col-sm-12">
      <h2>Resumen de compra</h2>
    </div>
<?php
if(isset($_GET["id"])){
  $id = $_GET["id"];

  try {
    require_once('includes/funciones/connection_db.php');
    $sql = "SELECT * FROM lentes_normales WHERE `id_lente` = {$id}";
    $resultado = $conn->query($sql);
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

  $lente = $resultado->fetch_array();
}else if(isset($_POST['id_compra'])){
  $ids = $_POST['id_compra'];
  $cantidad = $_POST['cantidad'];
  if (sizeof($ids) > 0) {
    for ($i=0; $i < sizeof($ids) ; $i++) {
      ${"id_$i"} = $ids[$i];
      ${"cantidad_$i"} = $cantidad[$i];
    }
    try {
      require_once('includes/funciones/connection_db.php');
      for ($i=0; $i < sizeof($ids) ; $i++) {
        $id_consulta = ${"id_$i"};
        $sql .= " SELECT nombre_lente, precio_lente FROM lentes_normales WHERE id_lente = {$id_consulta}; ";
      }
      if($conn->multi_query($sql)){
        do {
          if ($resultado = $conn->store_result()) {
            while ($lente = $resultado->fetch_assoc()) {?>
              <div class="col-xl-6">
                <?php echo $lente['nombre_lente']; ?>
              </div>
              <div class="col-xl-6">
                <?php echo $lente['precio_lente']; ?>
              </div>
            <?php }
            $resultado->free();
          }
        } while ($conn->next_result());
      }else{

        echo $conn->error;
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    $conn->close();
  }
}else{
  exit('Hubo un error, por favor regresa.');
}
?>
  </div>
</div>
<div class="container">
  <div class="row" style="padding: 100px 0;">
    <div class="col-sm-12">
      <h2>Pago</h2>
      <form action="pago.php" method="post" id="form_compra">
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-4">
            <label for="direccion_casa">Direcci&oacute;n</label>
            <input type="text" class="form-control" id="direccion_casa" placeholder="Nombre de la Calle" name="direccion_casa">
          </div>
          <div class="form-group col-sm-12 col-md-4">
            <label for="numero_casa">N&uacute;mero</label>
            <input type="text" class="form-control" placeholder="#1234" id="numero_casa" name="numero_casa">
          </div>
          <div class="form-group col-sm-12 col-md-2">
            <label for="estado_casa">Estado</label>
            <select class="custom-select" id="estado_casa" name="estado_casa">
              <option selected>Elije una opci&oacute;n...</option>
              <option value="jalisco">Jalisco</option>
              <option value="colima">Colima</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="form-group col-sm-12 col-md-4">
            <label for="cuidad_casa">Ciudad</label>
            <input type="text" class="form-control" id="ciudad_casa" name="ciudad_casa" placeholder="Guadalajara">
          </div>
          <div class="form-group col-sm-12 col-md-4">
            <label for="colonia_casa">Colonia</label>
            <input type="text" class="form-control" id="colonia_casa" placeholder="Santa Tere" name="colonia_casa">
          </div>
          <div class="form-group col-md-2">
            <label for="cp_casa">C.P.</label>
            <input type="number" class="form-control" id="cp_casa" name="cp_casa">
          </div>
          <div class="form-group col-sm-12">
            <label for="descripcion_casa">Descripci&oacute;n del domicilio</label>
            <textarea class="form-control" id="descripcion_casa" name="descripcion_casa" rows="3" placeholder="Portón café con manchas verdes..."></textarea>
          </div>

          <hr style="width:100%;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);">
          <div class="form-group col-md-6">
            <label for="nombre_tarjeta">Nombre</label>
            <input type="text" class="form-control" id="nombre_tarjeta" placeholder="Jhon..." name="nombre_tarjeta">
          </div>
          <div class="form-group col-md-6">
            <label for="apellido_tarjeta">Apellido</label>
            <input type="text" class="form-control" id="apellido_tarjeta" placeholder="Doe..." name="apellido_tarjeta">
          </div>
          <div class="form-group col-sm-4">
            <label for="tarjeta">Tarjeta</label>
            <input type="number" class="form-control" id="tarjeta" placeholder="XXXX XXXX XXXX XXXX" name="tarjeta">
            <p id="textHelpBlock" class="form-text text-muted">Favor de no introducir espacios</p>
          </div>
          <div class="form-group col-md-2">
            <label for="mes_caducidad">Mes</label>
            <select class="custom-select" id="mes_caducidad" name="mes_caducidad">
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">04</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="8">08</option>
              <option value="9">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="año_caducidad">A&ntilde;o</label>
            <select class="custom-select" id="año_caducidad" name="año_caducidad">
              <option value="2017">17</option>
              <option value="2018">18</option>
              <option value="2019">19</option>
              <option value="2020">20</option>
              <option value="2021">21</option>
              <option value="2022">22</option>
              <option value="2023">23</option>
              <option value="2024">24</option>
              <option value="2025">25</option>
              <option value="2026">26</option>
              <option value="2027">27</option>
              <option value="2028">28</option>
            </select>          </div>
          <div class="form-group col-md-2">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="Doe..." name="cvv">
          </div>
          <div class="form-group col-md-2">
            <label for="tipo_tarjeta">Tipo</label>
            <select class="form-control" id="tipo_tarjeta" name="tipo_tarjeta">
              <option value="visa">VISA</option>
              <option value="mastercard">MASTERCARD</option>
              <option value="discover">DISCOVER</option>
              <option value="amex">AMEX</option>
            </select>
          </div>
        </div>
        <input type="hidden" name="id_lente" value="<?php echo $id; ?>">
        <input type="hidden" name="precio_lente" value="<?php echo $lente['precio_lente']; ?>">
        <button type="submit" name="submit" class="btn btn-primary">Pagar</button>
      </form>
    </div>
  </div>
</div>


<?php include_once "includes/templates/footer.php"; ?>
