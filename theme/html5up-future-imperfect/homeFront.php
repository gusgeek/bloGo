<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<h1><a href="index.html"><?php echo siteName; ?></a></h1>
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
			<?php for ($i=0; $i < count($notes) ; $i++) { ?>
				<article class="post">
					<header>
						<div class="title">
							<h2><a href="publicacion?id=<?php echo $notes[$i]['_id']; ?>"><?php echo $notes[$i]['title']; ?></a></h2>
						</div>
					</header>
					<?php if (isset($notes[$i]['img'])) { ?>
						<a href="publicacion?id=<?php echo $notes[$i]['_id']; ?>" class="image featured"><img src="artworks/<?php echo $notes[$i]['img']; ?>" alt=""></a>
					<?php } ?>
					<p><?php echo $notes[$i]['prologo']; ?></p>
					<footer>
						<ul class="actions">
							<li><a href="publicacion?id=<?php echo $notes[$i]['_id']; ?>" class="button large">Leer Nota</a></li>
						</ul>
						<ul class="stats">
							<li><?php echo date("d/m/Y H:m:i", strtotime($notes[$i]['date'])); ?></li>
						</ul>
					</footer>
				</article>
			<?php } ?>
		</div>
		<section id="sidebar">
				<section id="intro">
					<header>
						<h2><?php echo siteName; ?></h2>
						<p><?php echo siteDesc; ?></p>
					</header>
				</section>
				<section>
					<h5>Categorias</h5>
					<div class="mini-posts">
						<?php for ($i=0; $i < count($blogCategorias) ; $i++) { ?>
							<article class="mini-post">
								<header>
									<h3><a href="categoria?id=<?php echo $blogCategorias[$i]['_id']; ?>"><?php echo $blogCategorias[$i]['title']; ?></a></h3>
								</header>
							</article>
						<?php } ?>
					</div>
				</section>
				<section id="footer">
					<!--<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
						<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
					</ul> -->
					<p class="copyright"> Desñado por: <a href="http://html5up.net">HTML5 UP</a> 
						<br> Modificado por: <a href="https://github.com/gusgeek">Gusgeek</a>
						<br> Ejecutado sobre: <a href="https://github.com/gusgeek/bloGo">BloGo</a></p>
				</section>
		</section>
	</div>
	<script src="./theme/html5up-future-imperfect/assets/js/jquery.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/browser.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/breakpoints.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/util.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/main.js"></script>
</body>
