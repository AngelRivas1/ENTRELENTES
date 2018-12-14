<?php include_once 'funciones/sesiones.php';

      include_once 'funciones/funciones.php';

      include_once 'templates/header.php';

      include_once 'templates/barra.php';

      include_once 'templates/navegacion.php' ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de administradores
      </h1>
    </section>

    <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Maneja los usuarios de esta secci&oacute;n</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="registros" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $sql = "SELECT id_lente, nombre_lente, precio_lente, cant_lente FROM lentes_normales ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while($lente = $resultado->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $lente['nombre_lente']; ?></td>
                          <td><?php echo $lente['precio_lente']; ?></td>
                          <td><?php echo $lente['cant_lente']; ?></td>
                          <td>
                            <a href="editar-lentes.php?id=<?php echo $lente['id_lente']?>" class="btn bg-orange btn-flat margin"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $lente['id_lente']?>" data-tipo="lente" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
  </div>

  <?php include_once 'templates/footer.php' ?>
