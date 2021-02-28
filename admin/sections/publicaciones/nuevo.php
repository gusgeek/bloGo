<?php $data = BloGoBack\Back::CategoriasData(); ?>

<script type="text/javascript">

	$(document).ready(function () {

		$('#contenido').summernote({
		    callbacks: {
		      onImageUpload: function(image) {
		          uploadImage(image[0]);
		      },
		      onMediaDelete : function(target) {
		              deleteFile(target[0].src);
		          }
		  },
		  height: 500,
		  focus: true,
		  toolbar: [
		    ['style', ['style']],
		    ['font', ['bold', 'underline', 'clear']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'video']],
		    ['view', ['fullscreen', 'codeview', 'help']],
		  ],

		});

		function uploadImage(image) {
		var data = new FormData();
		data.append("foto", image);
			$.ajax ({
				data: data,
				type: "POST",
				url: "<?= url_base ?>admin/core/actions.php?upArtworks",
				cache: false,
				contentType: false,
				processData: false,
					success: function(url) { $('#contenido').summernote('editor.insertImage', '<?= url_base ?>/artworks/publicaciones/'+url); },
					error: function(data) { console.log(data); }
			});
		}

		function deleteFile(image) {
		var data = new FormData();
		data.append("foto", image);
			$.ajax ({
				data: data,
				type: "POST",
				url: "<?= url_base ?>admin/core/actions.php?delArtworks="+image,
				cache: false,
				contentType: false,
				processData: false,
				success: function(url) { },
				error: function(data) { console.log(data); }
		 	 });
		}

	});

	function createPost(stts){
	    var formData = new FormData($("#metaBlog").get(0));
    		formData.append('status', stts);
	    var ajaxUrl = '<?= url_base ?>admin/core/actions.php?InsertBlog';
	    $.ajax({
	      url : ajaxUrl,
	      type : "POST",
	      data : formData,
	      contentType : false,
	      processData : false
	    }).done(function(response){ 
	    	var json = $.parseJSON(response);
	    	if (json.status == 1) { alert('Post Creado'); location.reload();}
	    	if (json.status == 0) { alert('Hubo un problema al Creado el Post, reintente')} 
	    }) .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
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
						Crear Publicacion
						<div class="float-right">
						  <button type="button" class="btn btn-sm btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <i class="fa fa-cog" aria-hidden="true"></i>
						  </button>
						  <div class="dropdown-menu dropdown-menu-right">
						    <button class="dropdown-item" onclick="createPost(1)" type="button">Guardar</button>
						    <button class="dropdown-item" onclick="createPost(3)" type="button">Borrador</button>
						  </div>
						</div>
					</h5>
					<div class="separata"></div>
					<div class="row">
						<div class="col-md-4">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Titulo</label>
								<input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp">
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Keywords</label>
								<input type="text" class="form-control" name="keywords" id="keywords" aria-describedby="emailHelp">
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Categoria</label>
								<select class="custom-select" id="categoria" name="categoria">
									<?php for ($i=0; $i < count($data['data']) ; $i++) { 
										echo '<option value="'.$data['data'][$i]['_id'].'">'.$data['data'][$i]['title'].'</option>';
									} ?>

							  </select>
							</div>
						</div>
						<div class="col-md-8">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Prologo</label>
								<input type="text" class="form-control" name="prologo" id="prologo" aria-describedby="emailHelp">
							</div>
						</div>
						<div class="col-md-4">
							<label for="exampleInputEmail1" class="form-label">Caratula</label>
							<br>
							<div class="input-group mb-3">
							  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon01">
							    <label class="custom-file-label" for="inputGroupFile01">Buscar Archivo</label>
							  </div>
							</div>
							<small id="passwordHelpBlock" class="form-text text-muted">
							  Solo se acepta PNG, JPG y GIF en formato 100x200
							</small>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nota</label>
								<textarea id="contenido" name="contenido"></textarea>
							</div>
						</div>

					
					</div>
				</div>
		    </div>
		</form>
	</div>
</main>

<script type="text/javascript">



</script>