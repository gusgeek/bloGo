<?php 

  include('kernel.php');

  $results = $blogConfig->fetch();
  $notes = $blogPost->orderBy('DESC')->fetch();
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <main class="container">
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light"><?php echo $results[0]['sitio']; ?></h1>
          <p class="lead text-muted"><?php echo $results[0]['desc']; ?></p>
        </div>
      </div>
    </section>
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
