<?php $data = BloGoBack\Back::PublicacionesData(); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
  <div class="container-fluid" id="container">
    <div class="separata"></div>
    <div class="row">
      <div class="col-sm card">
        <div class="separata"></div>
          <h5>
            Todas las Publicaciones
            <div class="float-right">
              <a type="button" class="btn btn-sm btn-secondary" href="<?= url_base ?>admin/publicaciones/nueva">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
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
                <?php if(count($data) == 0){ ?><tr class="alert-warning no-result" id="banner"><td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</td></center></tr><?php } ?>
              </tr>
            </thead>
            <tbody id="search-results"> 
              <?php for ($i=0; $i < count($data) ; $i++) { 
                echo "<tr><th style='padding-left:9px;'>".$data[$i]['title']."</th><th >".$data[$i]['status']."</th><th style='padding-right:9px;' class='text-center'><a href='".url_base."admin/publicaciones/editar/".$data[$i]['_id']."' class='fa fa-pencil-square-o' aria-hidden='true'></a></th></tr>";
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>