<?php 
  session_start();

  if (empty($_SESSION['idusuario'])) { echo "<meta http-equiv='refresh' content='1'>"; }
  else {

?>

<script type="text/javascript">
  $.ajax({

    url : './core/kernel.php?GetDashPostBlog',
    contentType : false,
    processData : false

  }).done(function(response){

    var json = $.parseJSON(response);
    var data = json.data;
    document.getElementById("count").innerHTML = data.length;


    if (data.length == 0) { $( "#banner" ).show(); }
    if (data.length > 0) { $( "#banner" ).hide(); }


    for(var i = 0; i < data.length; i++) {
        var obj = data[i];

        if (obj.status == 1) { var stats = 'Publicado'}
        if (obj.status == 2) { var stats = 'Eliminado'}
        if (obj.status == 3) { var stats = 'Borrador'}

        $('#search-results').prepend("<tr><th style='padding-left:9px;'>" + obj.title + "</th><th >"+stats+"</th><th style='padding-right:9px;' class='text-center'><i onclick='verPost(" + obj._id + ")' class='fa fa-pencil-square-o' aria-hidden='true'></i></th></tr>");

    }

     $( "#loadDiv" ).hide(); 
     $( "#container" ).show(); 

      
  });

  function verPost(id){

    $('#Activity').html('</br><center><br><br><div class="loader2"></div><br></center>');
    $("#Activity").load('./sections/post/editar.php?id='+id);

  }

$('#nueva').click(function(){
  $('#Activity').html('</br><center><br><br><div class="loader2"></div><br></center>');
  $("#Activity").load('./sections/post/nuevo.php');
});

</script>



<div class="container-fluid" style="display: none" id="container">
    <div class="separata"></div>
    <div class="row">
      <div class="col-sm-8 card fCardspace">
        <div class="separata"></div>
        <h3>Bienvenido <?php echo $_SESSION['name']; ?></h3>
        <p>Recuerde realizar copias de seguridad de forma recurrente</p>
        <h5>Comenzar</h5>
        <button id="nueva" class="btn btn-sm btn-outline-secondary"> Crear una Publicacion </button>
        <div class="separata"></div>
      </div>
      <div class="col-sm card">
        <div class="separata"></div>
        <h5>Cantidad de Publicaciones</h5>
        <div class="p"><div class="g"><center id='count' style='font-size: 35px'></center></div></div>
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
                <tr class="alert-warning no-result" id="banner"><td colspan="7"><center><i class="fa fa-warning"></i> No hay Resultados</td></center></tr>
              </tr>
            </thead>
            <tbody id="search-results"> </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<?php } ?>