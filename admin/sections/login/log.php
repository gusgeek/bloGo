<link href="./assets/section/signin.css" rel="stylesheet">

<script type="text/javascript">

    function logIn(){

        var formData = new FormData($("#LogIn").get(0));

        $.ajax({
            
            url : './core/kernel.php?LogIn',
            type : "POST",
            data : formData,
            contentType : false,
            processData : false

        }).done(function(response){

            var json = $.parseJSON(response);

            if (json.status == 1) {  location.reload(); }
            if (json.status == 2) { alert('Existe un problema con su Clave') }
            if (json.status == 0) { alert('Existe un problema con su Usuario') }

        })
        .fail(function(){ alert("Hubo un problema con la carga del Dato"); })
        .always(function(){ });

    };

</script>
<div class="row row-cols-1 row-cols-md-1 g-4">

<main class="form-signin text-center card">
  <form id="LogIn" onsubmit="return false">
    <br>
    <h1 class="h3 mb-3 fw-normal card-title"><img src="./assets/img/logo.svg"></h1>
    <br>
    <input type="text" name="inputUser" id="inputUser" class="form-control" placeholder="Nombre de Usuario" required autofocus>
    <br>
    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="logIn();">Iniciar</button>
    <p class="mt-5 mb-3 text-muted"> <a href="https://github.com/gusgeek">@gusgeek</a> &copy; 2010- <?php echo date('Y'); ?></p>
  </form>
</main>
</div>