<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<h1><a href="./"><?php echo siteName; ?></a></h1>
			<nav class="main">
				<ul>
					<li class="menu">
						<a class="fa-bars" href="#menu">Menu</a>
					</li>
				</ul>
			</nav>
		</header>
		<section id="menu">
			<section>
				<ul class="links">
					<li> <a href="./"> <h3>Inicio</h3> </a> </li>
					<li> <a href="./categorias"> <h3>Categorias</h3> </a> </li>
				</ul>
			</section>
		</section>
		<div id="main">
			<div class="main">
				<header>
					<div class="title">
						<h2><?php echo $blogPost['title']; ?></h2>
						<p><?php echo $blogPost['prologo']; ?></p>
					</div>
				</header>
			</div>
			<article class="post">
				<?php if (isset($blogPost['img'])) { echo '<span class="image featured"><img src="./artworks/publicaciones/'.$blogPost['img'].'" alt=""></span>'; } ?>
				<?php echo $blogPost['content'] ?>
				<footer>
					<ul class="stats">
						<li><a href="#">Redactado el <?php echo date("d/m/Y", strtotime($blogPost['date'])); ?></a></li>
					</ul>
				</footer>
			</article>
		</div>
	</div>
	<script src="./theme/html5up-future-imperfect/assets/js/jquery.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/browser.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/breakpoints.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/util.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/main.js"></script>
</body>
