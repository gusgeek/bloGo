<?php 

  include('kernel.php');

  $blogCategorias = $blogCategorias
          ->where( '_id', '=', $_GET['id'] )
          ->fetch();

  $notes = $blogPost
          ->where( 'category', '=', $_GET['id'] )
          ->where( 'status', '=', 1 )
          ->fetch();


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $results['desc']; ?>">
    <title><?php echo $blogCategorias[0]['title'].' - '.$results['sitio']; ?></title>

    <?php 

        echo '<meta property="og:title" content="Categoria '.$blogCategorias[0]['title'].' - '.$results['sitio'].'">';
        echo '<meta property="og:description" content="'.$results['sitio'].'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="Categoria '.$blogCategorias[0]['title'].' - '.$results['sitio'].'">';

        include('./theme/'.$results['theme']."/categoriaHeader.php");

        if (empty($results['ga'])) {} else { ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $results['ga']; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo $results['ga']; ?>');
        </script>
    <?php  } ?>

  </head>
  <?php include('./theme/'.$results['theme']."/categoriaFront.php"); ?>

</html>