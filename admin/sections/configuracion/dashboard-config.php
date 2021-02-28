<?php $data = BloGoBack\Back::ConfigData(); ?>
<script type="text/javascript">
      function updateConfig(){
        var formData = new FormData($("#formConfig").get(0));
        var ajaxUrl = './core/actions.php?UpdateConfigBlog';
        $.ajax({
          url : ajaxUrl,
          type : "POST",
          data : formData,
          contentType : false,
          processData : false
        }).done(function(response){ 
          var json = $.parseJSON(response);
          if (json.status == 1) { alert('Configuracion Aplicada'); }
          if (json.status == 0) { alert('Hubo un problema al guardar la Configuracion, reintente')}
        }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
    }

</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >
<div class="container-fluid" id="container">
    <div class="separata"></div>
    <div class="row">
      <div class="col-sm card">
        <div class="separata"></div>
          <h5> Configuracion
          <div class="float-right">
            <button type="button" class="btn btn-sm btn-secondary" onclick="updateConfig()">
              <i class="fa fa-check" aria-hidden="true"></i>
            </button>
          </div> </h5>
          <div class="separata"></div>
            <form id="formConfig">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Sitio</label>
                <input type="text" class="form-control" name="sitio" id="sitio" value="<?php echo $data['data'][0]['sitio']; ?>" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="desc" id="desc" value="<?php echo $data['data'][0]['desc']; ?>" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Google Analitycs ID de Medicion (gtag.js)</label>
                <input type="text" class="form-control" name="ga" id="ga" value="<?php echo $data['data'][0]['ga']; ?>" aria-describedby="emailHelp">
              </div>
            </form>
      </div>
    </div>
</div>
</main>