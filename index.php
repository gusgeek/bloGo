<?php 

  include('kernel.php');
  
  $notes = $blogPost->where( 'status', '=', 1 )->orderBy('DESC')->fetch();
  $blogCategorias = $blogCategorias->orderBy('DESC')->fetch();

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $results['desc']; ?>">
    <title><?php echo $results['sitio']; ?></title>

    <?php 

        echo '<meta property="og:title" content="Principal - '.$results['sitio'].'">';
        echo '<meta property="og:description" content="'.$results['sitio'].'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="Principal - '.$results['sitio'].'">';

        include('./theme/'.$results['theme']."/homeHeader.php");

        if (empty($results['ga'])) {} else { ?>
          <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $results['ga']; ?>"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo $results['ga']; ?>');
          </script>
          
    <?php } ?>

  </head>
  
  <?php include('./theme/'.$results['theme']."/homeFront.php"); ?>
  
</html>