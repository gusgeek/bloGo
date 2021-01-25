<?php 
  session_start();

  if (empty($_SESSION['idusuario'])) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>
<script type="text/javascript">
      
	$.ajax({

	    url : './core/kernel.php?GetAllCatBlog',
	    contentType : false,
	    processData : false

	}).done(function(response){

	    var json = $.parseJSON(response);
	    var data = json.data;
	    
		if (data.length == 0) { $( "#banner" ).show(); }
        if (data.length > 0) { $( "#banner" ).hide(); }

	    for(var i = 0; i < data.length; i++) {
	        var obj = data[i];

	        if (obj.status == 1) { var stats = 'Publicado'}

	        $('#search-results').prepend("<tr><th style='padding-left:9px;'>" + obj.title + "</th><th >"+stats+"</th><th style='padding-right:9px;' class='text-center'><i onclick='verCate(" + obj._id + ")' class='fa fa-pencil-square-o' aria-hidden='true'></i></th></tr>");

	    }

		$( "#loadDiv" ).hide(); 
		$( "#container" ).show(); 

	  
	});

	var modalCateg = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
		keyboard: false
	})

	function createCate(){
	    
	    var formData = new FormData($("#metaCate").get(0));
	    var ajaxUrl = './core/kernel.php?InsertCatBlog';

	    $.ajax({
	      url : ajaxUrl,
	      type : "POST",
	      data : formData,
	      contentType : false,
	      processData : false
	    })

	    .done(function(response){  

	    	var json = $.parseJSON(response);

    		if (json.status == 1) { alert('Usuario agregada');  modalCateg.hide()}
	    	if (json.status == 0) { alert('Hubo un problema al guardar la categoria, reintente')}

	    })
	    .fail(function(){ alert("Hubo un problema con la carga del Dato"); });

		$('#staticBackdrop').on('hidden.bs.modal', function (event) {
		  $("#Activity").load('./sections/categorias/dashboard.php');
		})
	
	}

	function verCate(id){
      $('#Activity').html('</br><center><br><br><div class="loader2"></div><br></center>');
      $("#Activity").load('./sections/categorias/editar.php?id='+id);
    }

</script>

<div class="container-fluid" style="display: none" id="container">
    <div class="separata"></div>
    <div class="row">
      <div class="col-sm card">
        <div class="separata"></div>
          <h5>
          	Categorias
			<div class="float-right">
				<button type="button" class="btn btn-sm btn-secondary" onclick="modalCateg.show()">
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</button>
			</div>
          </h5>
          <div class="separata"></div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered" >
            <thead class="thead-dark">
              <tr>
                <th scope="col" style='padding-left:9px;' width="100%">Titulo</th>
                <th scope="col">Estado</th>
                <th scope="col" style='padding-right:9px;' class='text-center'></th>
                <tr class="alert-warning no-result" id="banner"><td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</td></center></tr>

              </tr>
            </thead>
            <tbody id="search-results"> </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva Categoria</h5>
        <button type="button" class="btn btn-sm " data-bs-dismiss="modal" aria-label="Close" onclick="modalCateg.hide()"><i class="fa fa-close" aria-hidden="true"></i></button>
      </div>
      <div class="modal-body">
      	<form id="metaCate">
	        <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Titulo</label>
				<input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"onclick='createCate();'>Crear</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>