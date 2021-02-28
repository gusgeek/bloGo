<?php 
  require_once("./admin/core/actionsSite.php");
  if ($initSetup == True) { 
    header('Location: ./admin');
    exit; 
  } else {
  $blogPost = BloGoFront\Front::PublicacionaVer($_GET['id']); 
  if(empty($blogPost['status'])){  header('Location: ./'); } {
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo siteDesc; ?>">
    <title><?php echo $blogPost['title']; ?> - <?php echo siteName; ?></title>
    <?php 
        echo '<meta property="og:title" content="'.$blogPost['title'].' - '.siteName.'">';
        echo '<meta property="og:description" content="'.$blogPost['title'].' - '.siteDesc.'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="'.$blogPost['title'].' - '.siteName.'">';
        include(postHeader);
        if (empty(siteGa)) {} else { ?>
          <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo siteGa; ?>"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo siteGa; ?>');
          </script>
    <?php } ?>
  </head>
  <?php include(postFront); ?>
</html>
<?php } } ?>