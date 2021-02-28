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
			<center><h3>Listado de Categorias</h3></center>
			<hr>
			<section>
				<?php if (count($blogCategorias) == 0 ){ ?>
					<center><h4>Disculpe, no encontramos notas en esta categoria</h4></center>
				<?php } else { ?>
					<ul class="posts">
						<?php 	
							for ($i=0; $i < count($blogCategorias) ; $i++) {	
								if ($blogCategorias[$i]['status'] == 1) { ?>
								<li>
									<article>
										<header>
											<h3><a href="./categoria?id=<?php echo $blogCategorias[$i]['_id']; ?>"><?php echo $blogCategorias[$i]['title']; ?></a></h3>
										</header>
										
									</article>
								</li>
							<?php } 
							} 
						?>
					</ul>
				<?php } ?>
			</section>
		</div>
	</div>
	<script src="./theme/html5up-future-imperfect/assets/js/jquery.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/browser.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/breakpoints.min.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/util.js"></script>
	<script src="./theme/html5up-future-imperfect/assets/js/main.js"></script>
</body>
