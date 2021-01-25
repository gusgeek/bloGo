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
    <title><?php echo $results[0]['sitio']; ?></title>
    <meta name="theme-color" content="#7952b3">

  <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Favicons -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" ></script>

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
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light"><?php echo $results[0]['sitio']; ?></h1>
          <p class="lead text-muted"><?php echo $results[0]['desc']; ?></p>
        </div>
      </div>
    </section>

      <div class="card" style="padding-left: 15px; padding-right: 15px; padding-bottom: 10px; margin-bottom: 25px;">
        <h1 class="mt-5"><?php echo $blogPost[0]['title']; ?></h1>
        <p class="lead"><?php echo $blogPost[0]['content']; ?></p>
      </div>
  </main>
  </body>
</html>
