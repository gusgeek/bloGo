<?php $Categorias = BloGoBack\Back::CategoriasData(); ?>

    <script type="text/javascript">
      function createCate(){
      
        var formData = new FormData($("#metaCate").get(0));
        var ajaxUrl = '<?= url_base; ?>admin/core/actions.php?InsertCatBlog';

        $.ajax({
          url : ajaxUrl,
          type : "POST",
          data : formData,
          contentType : false,
          processData : false
        })

        .done(function(response){  

          var json = $.parseJSON(response);

          if (json.status == 1) { alert('Categoria agregada'); location.reload(); }
          if (json.status == 0) { alert('Hubo un problema al guardar la categoria, reintente')}

        })
        .fail(function(){ alert("Hubo un problema con la carga del Dato"); });

      $('#staticBackdrop').on('hidden.bs.modal', function (event) {
        $("#Activity").load('./sections/categorias/dashboard.php');
      })
    
    }
    </script>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
      <div class="container-fluid" id="container">
          <div class="separata"></div>
          <div class="row">
            <div class="col-sm card">
              <div class="separata"></div>
                <h5>
                  Categorias
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
                      <th scope="col" style='padding-left:9px;' width="100%">Titulo</th>
                      <th scope="col" style='padding-right:9px;' class='text-center'></th>
                      <?php if ($Categorias['count'] == 0) { echo '<tr class="alert-warning no-result" id="banner"><td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</td></center></tr>'; } ?>
                      
                    </tr>
                  </thead>
                  <tbody > 
                  	<?php for ($i=0; $i < count($Categorias['data']) ; $i++) { 
                  		echo "<tr>
                              <th style='padding-left:9px;'>".$Categorias['data'][$i]['title']."</th>
                              <th style='padding-right:9px;' class='text-center'><a  href='".url_base."admin/categoria/editar/".$Categorias['data'][$i]['_id']."' class='fa fa-pencil-square-o' aria-hidden='true'></a></th>
                            </tr>";
                  	} ?>
                  </tbody>
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
              <button type="button" class="btn btn-sm " data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
            </div>
			<div class="modal-body">
				<form id="metaCate">

				<div class="input-group">
					<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nombre de Categoria">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" id="button-addon2" onclick='createCate();'><i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>
				</form>

			</div>
          </div>
        </div>
      </div>
    </main>