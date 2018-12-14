<?php include_once 'includes/templates/header.php'; ?>
        <div class="hero-size divisor-flecha ellas elemento-inicio">
          <div class="hero">
            <div class="hero-content">
              <div class="">
                <h2 class="text-center"><i class="fas fa-glasses"></i><span></span> PARA ELLAS</h2>
              </div>
            </div><!-- .hero-content -->
          </div><!-- .hero -->
        </div><!-- .hero-size -->
      <section id="lentes" class="divisor-diagonal">
        <div class="container-fluid" id="ellas">
           <div class="row text-center">
              <?php
               try {
                 require_once('includes/funciones/connection_db.php');
                 $sql = "SELECT * FROM lentes_normales WHERE categoria = 'M'";
                 $resultado = $conn->query($sql);
               } catch (\Exception $e) {
                 $error = $e->getMessage();
                 echo $error;
               }
              ?>
              <?php while($lente = $resultado->fetch_assoc()):?>
              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                 <figure class="figure">
                    <a href="item.php?id=<?php echo $lente['id_lente']; ?>"><img class="img-fluid figure-img item-glass" src="img/<?php echo $lente['img1_lente']; ?>"></a>
                    <figcaption class="figure-caption name-glass">
                       <div class="c--anim-btn">
                          <span class="c-anim-btn">
                          <?php echo $lente['nombre_lente']; ?>
                          </span>
                          <span>
                          <a href="item.php=?id=<?php echo $lente['id_lente']; ?>" class="underlined"><?php echo $lente['nombre_lente']; ?></a>
                          </span>
                       </div>
                    </figcaption>
                 </figure>
              </div>
            <?php endwhile; ?>
           </div>
        </div>
      </section>
<?php include_once 'includes/templates/footer.php'; ?>
