<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/personalizacion.css">
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <title>Setup - bloGO</title>
        <script type="text/javascript">
            function Setup(){
                var formData = new FormData($("#metaBlog").get(0));
                var ajaxUrl = './core/actions.php?Setup';
                $.ajax({
                  url : ajaxUrl,
                  type : "POST",
                  data : formData,
                  contentType : false,
                  processData : false
                }).done(function(response){  
                  console.log(response);
                  var json = $.parseJSON(response);
                  if (json.status == 1) { alert('Instalacion Completa'); location.reload();}
                  if (json.status == 0) { alert('Hubo algun problema, porfavor reintente')} 
                }).fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
            }
        </script>
  </head>
  <body>
    <div class="container-fluid">
        <div class="header text-break">
            <h1><img src="./assets/img/logow.svg" width="170"></h1>
            <p>Programa de instalación</p>
        </div>
        <br>
        <div class="container p-3">
            <div class="row">
              <div class="col-md-12">
                  <div class="card mb-3">
                      <div class="card-body">
                        <p class="card-text"><strong>Bienvenido</strong><br>Este es el programa de instalación de bloGo. Porfavor complete los siguientes datos para la inicialización.</p>
                      </div>
                      <div class="card-body">
                        <form id="metaBlog">
                          <center><p class="card-text"><strong>Configuracion del Sitio</strong></p></center>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >Nombre del Sitio</label>
                                <input type="text" class="form-control" name="sitio">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion breve del sitio</label>
                                <input type="text" class="form-control" name="desc">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" value="//<?php echo explode('admin', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])[0]; ?>" name="url" >
                              <div class="form-group">
                                <label for="exampleInputPassword1">ID de Google Analitycs</label>
                                <input type="text" class="form-control" name="ga">
                              </div>
                            </div>
                          </div>
                          <br>
                            <center><p class="card-text"><strong>Usuario Principal</strong></p></center>
                          <br>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >Nombre y Apellido</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                              </div>
                            </div>
                             <div class="col-md-6">
                              <div class="form-group">
                                <label >Nombre de Usuario</label>
                                <input type="text" class="form-control" name="user" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >Contraseña</label>
                                <input type="password" class="form-control" name="pass" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <br>
                        </form>
                          <center><button class="btn btn-md btn-success" onclick="Setup()"> Instalar </button></center>

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  
  </body>
</html>