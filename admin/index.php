<?php 
  include "./core/kernel.php";
  session_start(); 
  if ($initSetup == True) { include ('./setup/index.php'); } else {
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma para la gestion de talleres">
    <meta name="author" content="Agustin Fernandez - github/gusgeek">
  	<title>bloGo - Admin Panel</title>
    <link rel="stylesheet" href="<?= url_base ?>/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= url_base; ?>/admin/assets/css/general.css">
    <link rel="stylesheet" type="text/css" href="<?= url_base; ?>/admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="<?= url_base; ?>/admin/assets/summernote/dist/summernote-bs4.css" rel="stylesheet">
    <script src="<?= url_base; ?>/admin/assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="<?= url_base; ?>/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= url_base; ?>/admin/assets/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= url_base; ?>/admin/assets/summernote/lang/summernote-es-ES.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {   
        var sideslider = $('[data-toggle=collapse-side]');
        var sel = sideslider.attr('data-target');
        var sel2 = sideslider.attr('data-target-2');
        sideslider.click(function(event){
            $(sel).toggleClass('in');
            $(sel2).toggleClass('out');
        });
      });  
    </script>
  </head>
  <body class="sidebar-o sidebar-dark">
    <?php 
    if (isset($_SESSION['idusuario'])) {  include ('./sections/core.php'); } 
    else { include ('./sections/login/log.php'); } 
    ?>
  </body>
</html>
<?php } ?>
