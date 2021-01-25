<?php 

  include('kernel.php');

  $results = $blogConfig->fetch();
  $blogPost = $blogPost
          ->where( '_id', '=', $_GET['nota'] )
          ->fetch();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $results[0]['desc']; ?>">
    <title><?php echo $results[0]['sitio']; ?> - <?php echo $results[0]['sitio']; ?></title>
    <meta name="theme-color" content="#7952b3">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" ></script>
    <?php if (empty($results[0]['ga'])) {} else {} ?>
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
  <main class="container">
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light"><?php echo $results[0]['sitio']; ?></h1>
          <p class="lead text-muted"><?php echo $results[0]['desc']; ?></p>
        </div>
      </div>
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="./">Inicio</a>
        </nav>
      </div>
    </section>
    <article class="blog-post">
      <h2 class="blog-post-title"><?php echo $blogPost[0]['title']; ?></h2>
      <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
      <p class="lead"><?php echo $blogPost[0]['content']; ?></p>
    </article>
  </main>

  </body>
</html>
