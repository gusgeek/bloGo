<?php 
	$directorios = '../theme/';
	$directorio  = scandir($directorios, 1);
?>


<script type="text/javascript">
	function setTheme(id){
	    var ajaxUrl = '../core/actions.php?SetTheme='+id;
	    $.ajax({ url : ajaxUrl })
	    .done(function(response){  
	    	var json = $.parseJSON(response);
	    	if (json.status == 1) { alert('Temas seleccionado'); }
	    	if (json.status == 0) { alert('Hubo un problema al guardar el Temas, reintente')}
	    }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
	}
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
	<div class="container-fluid" id="container">
		<div class="separata"></div>
		<div class="row">
			<div class="col-sm card">
			<div class="separata"></div>
			<h5> Temas </h5>
			<div class="separata"></div>
				<div class="row ">
	  	
					<?php 	for ($i=0; $i < count($directorio) -2 ; $i++) { 
							include($directorios.$directorio[$i]."/perfil.php"); ?>

						<div class="col-12 col-md-6 col-lg-3">
							<div class="card border-light">
							  <img src="<?php echo "../../theme/".$directorio[$i]."/logo.png" ?>" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h6 class="card-title">	<?php echo $nombre; ?> </h6>
							    <p class="card-text"><small class="text-muted"><?php echo $version; ?> &#183; <?php echo $autor; ?></small></p>
							    <p class="card-text"><?php echo $descripcion; ?></p>
							  </div>
							  <div class="card-footer text-muted alert-info btn" onclick="setTheme('<?php echo $dirname?>');">
							    <center>Aplicar</center>
							  </div>
							</div>
						</div>
					<?php } ?>
			
				</div>
			</div>
		</div>
	</div>
</main>	



