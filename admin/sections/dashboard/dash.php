<?php  $dashboard = BloGoBack\Back::DashboardData(); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
      <div class="container-fluid" id="container">
        <div class="separata"></div>
          <div class="row">
            <div class="col-sm-8 card fCardspace">
              <div class="separata"></div>
              <h3>Bienvenido <?php echo $_SESSION['name']; ?></h3>
                <p>Recuerde realizar copias de seguridad de forma recurrente</p>
                <h5>Comenzar</h5>
                <a href="<?= url_base ?>admin/publicaciones/nueva" class="btn btn-sm btn-outline-secondary"> Crear una Publicacion </a>
              <div class="separata"></div>
            </div>
            <div class="col-sm card">
              <div class="separata"></div>
              <h5>Cantidad de Publicaciones</h5>
              <div class="p">
                <div class="g">
                  <center id='count' style='font-size: 35px'><?php echo $dashboard['count']; ?></center>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm card">
              <div class="separata"></div>
                <h5>Ultimas entradas</h5>
              <div class="separata"></div>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" >
                    <thead class="thead-dark">
                      <tr>
                      <th scope="col" style='padding-left:9px;' width="100%">Titulo</th>
                      <th scope="col">Estado</th>
                      <th scope="col" style='padding-right:9px;' class='text-center'></th>
                      <tr class="alert-warning no-result" id="banner">
                        <?php if (count($dashboard['data']) == 0){ ?> <td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</center></td> <?php } ?>
                      </tr>
                    </thead>
                    <tbody id="search-results"> 
                    <?php 
                      for ($i=0; $i < count($dashboard['data']) ; $i++) { 
                        echo "<tr><th style='padding-left:9px;'>" .$dashboard['data'][$i]['title']. "</th>
                              <th>".$dashboard['data'][$i]['status']."</th>
                              <th style='padding-right:9px;' class='text-center'><a href='".url_base."admin/publicaciones/editar/".$dashboard['data'][$i]['_id']."' class='fa fa-pencil-square-o' aria-hidden='true'></a></th></tr>";
                      } 
                    ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
    </main>