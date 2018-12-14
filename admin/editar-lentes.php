<?php include_once 'funciones/sesiones.php';

      include_once 'funciones/funciones.php';
      $id = $_GET['id'];
      if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error, intenta de nuevo otra vez");
      }
      include_once 'templates/header.php';

      include_once 'templates/barra.php';

      include_once 'templates/navegacion.php'; ?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar lente
          </h1>
        </section>
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <section class="content">
              <div class="box"><!-- Default box -->
                <div class="box-header with-border">
                  <h3 class="box-title">Editar lente</h3>
                </div>
                <div class="box-body">
                  <?php

                  $sql = "SELECT * FROM lentes_normales WHERE id_lente = $id";
                  $resultado = $conn->query($sql);
                  $lente = $resultado->fetch_assoc();

                  ?>
                  <!-- form start -->
                  <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-lente.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="nombre_lente">Nombre del lente: </label>
                        <input type="text" class="form-control" id="nombre_lente" name="nombre_lente" placeholder="<?php echo $lente['nombre_lente']; ?>" value="<?php echo $lente['nombre_lente']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="descripcion_lente">Descripcion del lente: </label>
                        <input type="text" class="form-control" id="descripcion_lente" name="descripcion_lente" placeholder="<?php echo $lente['desc_lente']; ?>" value="<?php echo $lente['desc_lente']; ?>">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="cBox_desc"> Activar edici&oacute;n
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="precio_lente">Precio del lente: </label>
                        <input type="number" class="form-control" id="precio_lente" name="precio_lente" placeholder="<?php echo $lente['precio_lente']; ?>" value="<?php echo $lente['precio_lente']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="stock_lente">Cantidad en stock: </label>
                        <input type="number" class="form-control" id="stock_lente" name="stock_lente" placeholder="<?php echo $lente['cant_lente']; ?>" value="<?php echo $lente['cant_lente']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="imagen1_lente">Imagen 1: </label>
                        <input type="text" class="form-control" id="imagen1_lente" name="imagen1_lente" placeholder="<?php echo $lente['img1_lente']; ?>" value="<?php echo $lente['img1_lente']; ?>">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="cBox_img1"> Activar edici&oacute;n
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="imagen2_lente">Imagen 2: </label>
                        <input type="text" class="form-control" id="imagen2_lente" name="imagen2_lente" placeholder="<?php echo $lente['img2_lente']; ?>" value="<?php echo $lente['img2_lente']; ?>">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="cBox_img2"> Activar edici&oacute;n
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="imagen3_lente">Imagen 3: </label>
                        <input type="text" class="form-control" id="imagen3_lente" name="imagen3_lente" placeholder="<?php echo $lente['img3_lente']; ?>"  value="<?php echo $lente['img3_lente']; ?>">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="cBox_img3"> Activar edici&oacute;n
                        </label>
                      </div>
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <input type="hidden" name="registro" value="actualizar">
                      <input type="hidden" name="id_registro" value="<?php echo $id ?>">
                      <button type="submit" class="btn btn-primary" id="actualizar_registro_lente">Actualizar</button>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section><!-- /.content -->
          </div>
        </div>
        <!-- Main content -->

      </div>
  <?php include_once 'templates/footer.php' ?>
