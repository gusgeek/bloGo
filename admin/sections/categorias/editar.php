<?php $Categorias = BloGoBack\Back::CategoriaVer($_GET['id']); ?>

<script type="text/javascript">

	// Acciono en Base de Datos

		function updatePost(){

		    var formData = new FormData($("#metaBlog").get(0));
		    var ajaxUrl = '<?= url_base; ?>admin/core/actions.php?UpdateCatBlog=<?php echo $_GET['id']; ?>';
		    $.ajax({
		      url : ajaxUrl,
		      type : "POST",
		      data : formData,
		      contentType : false,
		      processData : false
		    })
		    .done(function(response){ 

      			var json = $.parseJSON(response);
      			if (json.status) { alert('Categoria modificada'); location.reload(); }

		    })
		    .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
		}



</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
	<div class="container-fluid"  id="container">
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
								<input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $Categorias['title'] ?>" aria-describedby="emailHelp">
							</div>
						</div>
					</div>
				</div>
		    </div>
		</form>
	</div>
</main>
