<?php 
  session_start();

  if ((empty($_SESSION['idusuario'])) || ($_SESSION['level'] == 2)) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>

<script type="text/javascript">
      
      $.ajax({

        url : './core/kernel.php?GetConfigBlog',
        contentType : false,
        processData : false

      }).done(function(response){

        var json = $.parseJSON(response);
        var data = json.data;

        if (data == "") {} else {
          document.getElementById('sitio').value = data[0].sitio;
          document.getElementById('desc').value = data[0].desc;
          document.getElementById('ga').value = data[0].ga;
        }

        $( "#loadDiv" ).hide(); 
        $( "#container" ).show();

      });


      function updateConfig(){

        var formData = new FormData($("#formConfig").get(0));
        var ajaxUrl = './core/kernel.php?UpdateConfigBlog';
        $.ajax({
          url : ajaxUrl,
          type : "POST",
          data : formData,
          contentType : false,
          processData : false
        })
        .done(function(response){ 

          var json = $.parseJSON(response);

          if (json.status == 1) { alert('Configuracion Aplicada'); $("#Activity").load('./sections/config/dashboard.php');}
          if (json.status == 0) { alert('Hubo un problema al guardar la categoria, reintente')} 
        })
        .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
    }

</script>


<div class="container-fluid" style="display: none" id="container">
    <div class="separata"></div>
    <div class="row">
      <div class="col-sm card">
        <div class="separata"></div>
          <h5>
            Configuracion
      <div class="float-right">
        <button type="button" class="btn btn-sm btn-secondary" onclick="updateConfig()">
          <i class="fa fa-check" aria-hidden="true"></i>
        </button>
      </div>
          </h5>
          <div class="separata"></div>
            <form id="formConfig">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Sitio</label>
                <input type="text" class="form-control" name="sitio" id="sitio" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="desc" id="desc" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Google Analitycs ID de Medicion (gtag.js)</label>
                <input type="text" class="form-control" name="ga" id="ga" aria-describedby="emailHelp">
              </div>
            </form>
      </div>
    </div>
</div>

<?php } ?>