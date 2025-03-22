<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Bienvenido
      <small>Panel de administración</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">tablero</li>
    </ol>
  </section>

  <section class="content">
    <?php
      $perfil = $_SESSION["perfil"] ?? '';
      $nombre = $_SESSION["nombre"] ?? '';

      if ($perfil === "Administrador") {
    ?>
        <div class="row">
          <?php include "inicio/cajas-superiores.php"; ?>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <?php include "reportes/grafico-ventas.php"; ?>
          </div>
          <div class="col-lg-6">
            <?php include "reportes/productos-mas-vendidos.php"; ?>
          </div>
          <div class="col-lg-6">
            <?php include "inicio/productos-recientes.php"; ?>
          </div>
        </div>
    <?php
      } elseif ($perfil === "Especial" || $perfil === "Vendedor") {
    ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-success">
              <div class="box-header">
                <h1>Bienvenidos <?php echo $nombre; ?></h1>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
  </section>
</div>
