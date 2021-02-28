<?php $data = BloGoBack\Back::UsuariosData($configDB); ?>

<script type="text/javascript">
	function createCate(){
	    var formData = new FormData($("#metaCate").get(0));
	    var ajaxUrl = './core/actions.php?InsertUserBlog';
	    $.ajax({
	      url : ajaxUrl,
	      type : "POST",
	      data : formData,
	      contentType : false,
	      processData : false
	    }).done(function(response){  
	    	var json = $.parseJSON(response);
	    	if (json.status == 1) { alert('Usuario agregada');  location.reload(); }
	    	if (json.status == 0) { alert('Hubo un problema al guardar la categoria, reintente')}
	    }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
	}
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
	<div class="container-fluid" id="container">
	    <div class="separata"></div>
	    <div class="row">
	      <div class="col-sm card">
	        <div class="separata"></div>
	          <h5>
	          	Usuarios
				<div class="float-right">
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#staticBackdrop">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				</div>
	          </h5>
	          <div class="separata"></div>
	        <div class="table-responsive">
	          <table class="table table-hover table-bordered" >
	            <thead class="thead-dark">
	              <tr>
	                <th scope="col" style='padding-left:9px;' width="100%">Nombre</th>
	                <th scope="col">Usuario</th>
	                <th scope="col">Privilegio</th>
	                <th scope="col" style='padding-right:9px;' class='text-center'></th>
	            	<?php if (count($data['data']) == 0) { echo '<tr class="alert-warning no-result" id="banner"><td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</td></center></tr>'; } ?>
	              </tr>
	            </thead>
	            <tbody id="search-results"> 
	            	<?php 
	            		for ($i=0; $i < count($data['data']) ; $i++) { 
	            			if($data['data'][$i]['level'] == 1){ $status = 'Administrador'; } else { $status = 'Usuario'; }
	            			echo "
		            			<tr>
				            		<th style='padding-left:9px;'>".$data['data'][$i]['name']."</th>
				            		<th>".$data['data'][$i]['user']."</th>
				            		<th >".$status."</th>
				            		<th style='padding-right:9px;' class='text-center'><a  href='".url_base."admin/usuarios/editar/".$data['data'][$i]['_id']."' class='fa fa-pencil-square-o' aria-hidden='true'></a></th>
				            	</tr>
	            			";
	            		}
	            	?>
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	</div>
</main>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva Categoria</h5>
        <button type="button" class="btn btn-sm " data-bs-dismiss="modal" aria-label="Close" ><i class="fa fa-close" aria-hidden="true"></i></button>
      </div>
      <div class="modal-body">
      	<form id="metaCate">
	        <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Nombre</label>
				<input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">User Name</label>
				<input type="text" class="form-control" name="user" id="user" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Contrasena</label>
				<input type="password" class="form-control" name="pass" id="pass" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Privilegios</label>
				<select name="level" id="level" class="custom-select">
					<option value="1">Admin</option>
					<option value="2">Limit</option>
				</select>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"onclick='createCate();'>Crear</button>
      </div>
    </div>
  </div>
</div>
