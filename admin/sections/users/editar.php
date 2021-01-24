<?php 
  session_start();

  if ((empty($_SESSION['idusuario'])) || ($_SESSION['level'] == 2)) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>
<script type="text/javascript">

	// Obtengo la Publicacion

	    $.ajax({ url : './core/kernel.php?GetThisUserBlog=<?php echo $_GET['id']; ?>', }).done(function(response){

	    	var json = $.parseJSON(response);

	    	document.getElementById('name').value = json[0].name;
	    	$("#level option[value='"+json[0].level+"']").attr("selected", true);
	        $( "#loadDiv" ).hide(); 
    		$( "#container" ).show(); 

	    }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;

	// Acciono en Base de Datos

		function updateUser(stts){
		    var formData = new FormData($("#metaBlog").get(0));
	    		formData.append('status', stts);

		    var ajaxUrl = './core/kernel.php?UpdateUserBlog=<?php echo $_GET['id']; ?>';
		    $.ajax({
		      url : ajaxUrl,
		      type : "POST",
		      data : formData,
		      contentType : false,
		      processData : false
		    })
		    .done(function(response){ 
	    var json = $.parseJSON(response);
		    	

			    if (json.status == 1) { alert('Usuario modificado'); $("#Activity").load('./sections/users/editar.php?id='+<?php echo $_GET['id']; ?>);}

		    	if (json.status == 0) { alert('Hubo un problema al guardar la categoria, reintente')}

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
					Editar Usuario
					<div class="float-right">
					  <button type="button" class="btn btn-sm btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <i class="fa fa-cog" aria-hidden="true"></i>
					  </button>
					  <div class="dropdown-menu dropdown-menu-right">
					    <button class="dropdown-item" onclick="updateUser(1)" type="button">Guardar</button>
					    <button class="dropdown-item" onclick="updateUser(2)" type="button">Bloquear</button>
					  </div>
					</div>
				</h5>
				<div class="separata"></div>
				<div class="row">
					<div class="col-md-4">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nombre</label>
							<input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Clave</label>
							<input type="text" class="form-control" name="pass" id="pass" aria-describedby="emailHelp">
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Privilegios</label>
							<select name="level" id="level" class="custom-select">
								<option value="1" id="1">Admin</option>
								<option value="2" id="2">Limit</option>
							</select>
						</div>
					</div>
				
				</div>
			</div>
	    </div>
	</form>
</div>
<?php } ?>