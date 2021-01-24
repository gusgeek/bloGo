<?php session_start(); ?>
<link href="./assets/section/dashboard.css" rel="stylesheet">
<script type="text/javascript">

	$(document).ready(function(){
		$('#Activity').load('./sections/dashboard/dash.php');

      $('.nav-item>a').on('click', function(){

          $( "#container" ).hide(); 
          $( "#loadDiv" ).show(); 

          $('.nav-item>a').removeClass('active');
          $('#sidebarMenu').removeClass('show');
          $(this).addClass('active');

      });

	});  

    function logOut(){

        var ajaxUrl = './sections/login/logout.php';
        $.ajax({ url : ajaxUrl })
        .done(function(response){  if (response == 1) { location.reload(); } })
        .fail(function(){ alert("Hubo un problema con la carga del Dato"); }) ;
    }

  $('#dashboard').click(function(){
    $("#Activity").load('./sections/dashboard/dash.php');
  });
  $('#categodash').click(function(){
    $("#Activity").load('./sections/categorias/dashboard.php');
  });
  $('#publidash').click(function(){
    $("#Activity").load('./sections/post/dashboard.php');
  });
  $('#configdash').click(function(){
    $("#Activity").load('./sections/config/dashboard.php');
  });
  $('#usersdash').click(function(){
    $("#Activity").load('./sections/users/dashboard.php');
  });
</script>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><center><img src="./assets/img/logow.svg" width="70"></center></a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#" onclick="logOut()">Cerrar sesion</a>
    </li>
  </ul>
</nav>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item"> <a class="nav-link active" aria-current="page" id="dashboard" href="#"> Dashboard </a> </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Blog</span>
          </h6>
          <li class="nav-item"> <a class="nav-link" aria-current="page" id="categodash" href="#"> Categorias </a> </li>
          <li class="nav-item"> <a class="nav-link" aria-current="page" id="publidash" href="#"> Publicaciones </a> </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Panel de Control</span>
          </h6>
          <li class="nav-item"> <a class="nav-link" aria-current="page" id="usersdash" href="#"> Usuarios </a> </li>
          <li class="nav-item"> <a class="nav-link" aria-current="page" id="configdash" href="#"> Configuracion </a> </li>
        </ul>
      </div>
    </nav>

	    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"  >

        <div id="loadDiv" style="display: show"></br><center><br><br><div class="loader2"></div><br></center></div>

        <div id="Activity"></div>
	      
	      	
	  	</div>
	  	
    </main>
  </div>
</div>