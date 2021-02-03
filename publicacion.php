<?php 

  include('kernel.php');

  $results = $blogConfig->fetch();
  $blogCategorias = $blogCategorias->fetch();
  $blogPost = $blogPost
          ->where( '_id', '=', $_GET['nota'] )
          ->where( 'status', '=', 1 )
          ->fetch();

          if(empty($blogPost)){
            header('Location: ./');
          }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $results[0]['desc']; ?>">
    <title><?php echo $blogPost[0]['title']; ?> - <?php echo $results[0]['sitio']; ?></title>
    <?php 

        echo '<meta property="og:title" content="'.$blogPost[0]['title'].' - '.$results[0]['sitio'].'">';
        echo '<meta property="og:description" content="'.$blogPost[0]['title'].' - '.$results[0]['sitio'].'">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="description" content="'.$blogPost[0]['title'].' - '.$results[0]['sitio'].'">';

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

    .blog-post {
      margin-bottom: 4rem;
    }
    .blog-post-title {
      margin-bottom: .25rem;
      font-size: 2.5rem;
    }
    .blog-post-meta {
      margin-bottom: 1.25rem;
      color: #727272;
    }

  </style>
    
  </head>
  <body>
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
  <main class="container ">
    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <h2 class="blog-post-title"><?php echo $blogPost[0]['title']; ?></h2>
          <p class="blog-post-meta">Escrito: <?php echo date("d/m/Y h:s", strtotime($blogPost[0]['date'])); ?> <br> Prologo: <?php echo $blogPost[0]['prologo']; ?></p>
          <p class="lead"><?php echo $blogPost[0]['content']; ?></p>
        </article>
      </div>
      <div class="col-md-4  ">
     
        <div class="p-4 bg-light">
          <h4 class="font-italic">Categorias</h4>
          <ol class="list-unstyled">
            <?php for ($i=0; $i < count($blogCategorias) ; $i++) { echo '<li><a href="./categoria.php?id='.$blogCategorias[$i]['_id'].'">'.$blogCategorias[$i]['title'].'</a></li>'; } ?>
          </ol>
        </div>
      </div>
    </div>
    
  </main>

  </body>
</html>
