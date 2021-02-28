<?php 
  if (empty($_SESSION['idusuario'])) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {
?>
<link href="<?php echo url_base; ?>/admin/assets/section/dashboard.css" rel="stylesheet">
<script type="text/javascript">
    function logOut(){
        var ajaxUrl = './sections/login/logout.php';
        $.ajax({ url : ajaxUrl })
        .done(function(response){  if (response == 1) { location.reload(); } })
        .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
    }
</script>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><center><img src="<?= url_base; ?>/admin/assets/img/logow.svg" width="70"></center></a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#" onclick="logOut()">Cerrar sesion</a>
    </li>
  </ul>
</nav>
<div class="container-fluid">
  <div class="row">

    <?php 
    
      include ('./sections/menu.php');

      if (isset($_GET['page'])) {

        // Categorias

          if (($_GET['page'] == 'categoria') && (empty($_GET['section']))) { include ('./sections/categorias/dashboard.php'); } 
          else if (($_GET['page'] == 'categoria') && ($_GET['section'] == 'editar' ) && (isset($_GET['id']))) { include ('./sections/categorias/editar.php'); } 

        // Publicaciones

          else if (($_GET['page'] == 'publicaciones') && (empty($_GET['section']))) { include ('./sections/publicaciones/dashboard.php'); } 
          else if (($_GET['page'] == 'publicaciones') && ($_GET['section'] == 'nueva')) { include ('./sections/publicaciones/nuevo.php'); } 
          else if (($_GET['page'] == 'publicaciones') && ($_GET['section'] == 'editar') && (isset($_GET['id']))) { include ('./sections/publicaciones/editar.php'); } 

        // Usuarios

          else if (($_GET['page'] == 'usuarios') && (empty($_GET['section']))) { include ('./sections/usuarios/dashboard.php'); } 
          else if (($_GET['page'] == 'usuarios') && ($_GET['section'] == 'editar') && (isset($_GET['id']))) { include ('./sections/usuarios/editar.php'); } 

        // Configuracion

          else if (($_GET['page'] == 'configuracion') && (empty($_GET['section']))) { include ('./sections/configuracion/dashboard-config.php'); } 
          else if (($_GET['page'] == 'configuracion') && ($_GET['section'] == 'themes')) { include ('./sections/configuracion/dashboard-theme.php'); } 

        else { include ('./sections/404.php'); }
      } else { include ('./sections/dashboard/dash.php'); }

    ?>

  </div>
</div>

<?php } ?>
