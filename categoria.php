<?php 
  require_once("./admin/core/actionsSite.php");
  if ($initSetup == True) { 
    header('Location: ./admin');
    exit; 
  } else {
  $CategoriaVer = BloGoFront\Front::CategoriaVer($_GET['id']); 
  $notes = $CategoriaVer['post'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo siteDesc; ?>">
    <title><?php echo $CategoriaVer['cate']['title'].' - '.siteName; ?></title>
    <?php 
        echo '<meta property="og:title" content="Categoria '.$CategoriaVer['cate']['title'].' - '.siteName.'">';
        echo '<meta property="og:description" content="'.siteName.'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="Categoria '.$CategoriaVer['cate']['title'].' - '.siteName.'">';
        include(categoriaHeader);
        if (empty($results['ga'])) {} else { ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo siteGa; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo $results['ga']; ?>');
        </script>
    <?php  } ?>
  </head>
  <?php include(categoriaFront); ?>
</html>
<?php } ?>