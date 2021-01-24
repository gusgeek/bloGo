<?php 
  session_start();

  if (empty($_SESSION['idusuario'])) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>

<script type="text/javascript">
	// Obtengo las Categorias

		$.ajax({
		    url : './core/kernel.php?GetAllCatBlog',
		    contentType : false,
		    processData : false
		}).done(function(response){

		    var json = $.parseJSON(response);
		    var data = json.data;

		    for(var i = 0; i < data.length; i++) {
		        var obj = data[i];
		        $('#categoria').prepend("<option value='" + obj._id + "' id='" + obj._id + "'>" + obj.title + "</option>");
		    }

		});

	// Obtengo la Publicacion

	    $.ajax({ url : './core/kernel.php?GetThisPostBlog=<?php echo $_GET['id']; ?>', }).done(function(response){

	    	var json = $.parseJSON(response);

	    	document.getElementById('titulo').value = json[0].title;
	    	document.getElementById('keywords').value = json[0].keywords;
	    	$("#categoria option[value='"+json[0].category+"']").attr("selected", true);
	    	
			CKEDITOR.replace( 'contenido' );
			CKEDITOR.instances['contenido'].setData(json[0].content);

		    $( "#loadDiv" ).hide(); 
    		$( "#container" ).show(); 

	    }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;

	// Acciono en Base de Datos

		function updatePost(stts){
		    var formData = new FormData($("#metaBlog").get(0));
		    var data = CKEDITOR.instances['contenido'].getData();

			    formData.append('contenido', data);
	    		formData.append('status', stts);

		    var ajaxUrl = './core/kernel.php?UpdatePostBlog=<?php echo $_GET['id']; ?>';
		    $.ajax({
		      url : ajaxUrl,
		      type : "POST",
		      data : formData,
		      contentType : false,
		      processData : false
		    })
		    .done(function(response){  

		    	if (json.status == 1) { alert('Post modificado'); $("#Activity").load('./sections/post/editar.php?id='+<?php echo $_GET['id']; ?>);}

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
					    <button class="dropdown-item" onclick="updatePost(1)" type="button">Guardar</button>
					    <button class="dropdown-item" onclick="updatePost(2)" type="button">Eliminar</button>
					    <button class="dropdown-item" onclick="updatePost(3)" type="button">Borrador</button>
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
							<select class="custom-select" id="categoria" name="categoria"> </select>
						</div>
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

<?php } ?>