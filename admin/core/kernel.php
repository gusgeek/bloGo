<?php 

	require_once("framework/autoload.php");
	require_once('config.php');
	require_once('controller.php');
	require_once('functions.php');

	$res = BloGoBack\Back::ConfigData();

	if (empty($res['data'][0]['setup'])) { $initSetup = True; } else { define('url_base', $res['data'][0]['url']); $initSetup = False; }

	

	

?>