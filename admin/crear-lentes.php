<?php include_once 'funciones/sesiones.php';

      include_once 'funciones/funciones.php';

      include_once 'templates/header.php';

      include_once 'templates/barra.php';

      include_once 'templates/navegacion.php'; ?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Insertar lentes
            <small>Llena el formulario para ingresar lentes</small>
          </h1>
        </section>
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <section class="content">
              <div class="box"><!-- Default box -->
                <div class="box-header with-border">
                  <h3 class="box-title">Insertar lente</h3>
                </div>
                <div class="box-body">
                  <!-- form start -->
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-lente.php">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nombre_lente">Nombre del lente: </label>
                      <input type="text" class="form-control" id="nombre_lente" name="nombre_lente" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <label for="cat_lente">Categoria: </label><!-- nuevo select -->
                      <select class="form-control select2" name="cat_lente" id="cat_lente" style="width: 100%;">
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                        <option value="U">Unisex</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label for="descripcion_lente">Descripcion del lente: </label>
                      <input type="text" class="form-control" id="descripcion_lente" name="descripcion_lente" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label for="precio_lente">Precio del lente: </label>
                      <input type="number" class="form-control" id="precio_lente" name="precio_lente" placeholder="Ej: $1200">
                    </div>
                    <div class="form-group">
                      <label for="stock_lente">Cantidad en stock: </label>
                      <input type="number" class="form-control" id="stock_lente" name="stock_lente" placeholder="Ej: 20">
                    </div>
                    <div class="form-group">
                      <label for="imagen1_lente">Imagen 1: </label>
                      <input type="text" class="form-control" id="imagen1_lente" name="imagen1_lente" placeholder="Ej: lente_principal_1">
                    </div>
                    <div class="form-group">
                      <label for="imagen2_lente">Imagen 2: </label>
                      <input type="text" class="form-control" id="imagen2_lente" name="imagen2_lente" placeholder="Ej: lente_de_lado_1">
                    </div>
                    <div class="form-group">
                      <label for="imagen3_lente">Imagen 3: </label>
                      <input type="text" class="form-control" id="imagen3_lente" name="imagen3_lente" placeholder="lente_perspectiva_1">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_registro_lente">A&ntilde;adir</button>
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
