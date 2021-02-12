<?php 

  include('kernel.php');

  $blogCategorias = $blogCategorias->fetch();
  $blogPost = $blogPost
          ->where( '_id', '=', $_GET['id'] )
          ->where( 'status', '=', 1 )
          ->fetch()[0];

          if(empty($blogPost)){  header('Location: ./'); }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $results[0]['desc']; ?>">
    <title><?php echo $blogPost['title']; ?> - <?php echo $results['sitio']; ?></title>
    <?php 

        echo '<meta property="og:title" content="'.$blogPost['title'].' - '.$results['sitio'].'">';
        echo '<meta property="og:description" content="'.$blogPost['title'].' - '.$results['sitio'].'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="'.$blogPost['title'].' - '.$results['sitio'].'">';

        include('./theme/'.$results['theme']."/postHeader.php");

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
  <?php include('./theme/'.$results['theme']."/postFront.php"); ?>
</html>
