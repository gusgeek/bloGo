<?php 

  include('kernel.php');

  $results = $blogConfig->fetch();

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
    <meta name="description" content="<?php echo $results[0]['desc']; ?>">
    <title><?php echo $blogCategorias[0]['title'].' - '.$results[0]['sitio']; ?></title>

    <?php 

        echo '<meta property="og:title" content="Categoria '.$blogCategorias[0]['title'].' - '.$results[0]['sitio'].'">';
        echo '<meta property="og:description" content="'.$results[0]['sitio'].'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="Categoria '.$blogCategorias[0]['title'].' - '.$results[0]['sitio'].'">';

    ?>

    <meta name="theme-color" content="#7952b3">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" ></script>

    <?php if (empty($results[0]['ga'])) {} else { ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $results[0]['ga']; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo $results[0]['ga']; ?>');
        </script>
    <?php  } ?>

    <script type="text/javascript">
      function leerNota(id){ window.location.href = "./publicacion.php?nota="+id; }
    </script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body>

  <main class="container">
  <div class="container" style="padding-bottom: 35px;">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="p-2 link-secondary" href="./">Inicio</a>
        </div>
        <div class="col-4 text-center">
          <h1 class="fw-light"><?php echo $results[0]['sitio']; ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          
          <a class="p-2 link-secondary" href="./categorias.php">Categorias</a>
        </div>
      </div>
    </header>
  </div>
    <div class="row" data-masonry='{"percentPosition": true }'>
      <?php for ($i=0; $i < count($notes) ; $i++) { ?>
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="card">
            <?php if (empty($notes[$i]['img'])) { } else { ?>
              <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="./artworks/<?php echo $notes[$i]['img'] ?>">
            <?php } ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo $notes[$i]['title'] ?></h5>
              <?php if (empty($notes[$i]['prologo'])) { } else { ?>
              <p class="card-text"><?php echo $notes[$i]['prologo'] ?></p>
              <?php } ?>
            </div>
            <div onclick="leerNota(<?php echo $notes[$i]['_id'] ?>);" class="card-footer text-muted alert-success text-center">
              Leer Publicacion
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
  </body>
</html>