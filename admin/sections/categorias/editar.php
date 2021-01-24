<?php 
  session_start();

  if (empty($_SESSION['idusuario'])) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>

<script type="text/javascript">

	// Obtengo la Categoria

	    $.ajax({ url : './core/kernel.php?GetThisCatBlog=<?php echo $_GET['id']; ?>' }).done(function(response){
	    	var json = $.parseJSON(response);
	    	document.getElementById('titulo').value = json[0].title;
			$( "#loadDiv" ).hide(); 
			$( "#container" ).show();
	    })
	    .fail(function(){ alert("Hubo un problema con la carga del Dato"); });

	// Acciono en Base de Datos

		function updatePost(){

		    var formData = new FormData($("#metaBlog").get(0));
		    var ajaxUrl = './core/kernel.php?UpdateCatBlog=<?php echo $_GET['id']; ?>';
		    $.ajax({
		      url : ajaxUrl,
		      type : "POST",
		      data : formData,
		      contentType : false,
		      processData : false
		    })
		    .done(function(response){ 

	    		var json = $.parseJSON(response);

		    	if (json.status == 1) { alert('Categoria modificado'); $("#Activity").load('./sections/categorias/editar.php?id='+<?php echo $_GET['id']; ?>);}
		    	if (json.status == 0) { alert('Hubo un problema al guardar el post, reintente')}  

		    })
		    .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
		}



</script>
<div class="container-fluid" style="display: none" id="container">
    <div class="separata"></div>
	<form id="metaBlog">
	    <div class="row">
			<div class="col-sm card">
				<div class="separata"></div>
				<h5>
					Editar Publicacion
					<div class="float-right">
					  <button type="button" class="btn btn-sm btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <i class="fa fa-cog" aria-hidden="true"></i>
					  </button>
					  <div class="dropdown-menu dropdown-menu-right">
					    <button class="dropdown-item" onclick="updatePost()" type="button">Guardar</button>
					  </div>
					</div>
				</h5>
				<div class="separata"></div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Titulo</label>
							<input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp">
						</div>
					</div>
				</div>
			</div>
	    </div>
	</form>
</div>

<?php } ?>