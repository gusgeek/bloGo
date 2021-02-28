<?php 

	$res = BloGoFront\Front::ConfigData(); 

	if (empty($res['data'][0]['setup'])) { $initSetup = True; } else { $initSetup = False; }

	// Site Define

		define('siteName', $res['data'][0]['sitio']);
		define('siteDesc', $res['data'][0]['desc']);
		define('siteGa', $res['data'][0]['ga']);
		
	// Theme Define	

		define('homeHeader', './theme/'.$res['data'][0]['theme'].'/homeHeader.php');
		define('homeFront', './theme/'.$res['data'][0]['theme'].'/homeFront.php');
		define('categoriasHeader', './theme/'.$res['data'][0]['theme'].'/categoriasHeader.php');
		define('categoriasFront', './theme/'.$res['data'][0]['theme'].'/categoriasFront.php');
		define('categoriaHeader', './theme/'.$res['data'][0]['theme'].'/categoriaHeader.php');
		define('categoriaFront', './theme/'.$res['data'][0]['theme'].'/categoriaFront.php');
		define('postHeader', './theme/'.$res['data'][0]['theme'].'/postHeader.php');
		define('postFront', './theme/'.$res['data'][0]['theme'].'/postFront.php');

		
 ?>