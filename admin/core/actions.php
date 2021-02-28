<?php 

session_start();

	require_once("framework/autoload.php");
	require_once('config.php');
	require_once('controller.php');
	require_once('functions.php');

	if (isset($_GET['login'])) { 

		$results = BloGoBack\Back::LogIn($_POST['inputUser'], $_POST['inputPassword']);

			if ($results['status'] == 1) {

				$_SESSION['idusuario'] = $results['idusuario'];
				$_SESSION['name'] = $results['name'];
				$_SESSION['level'] = $results['level'];

				echo $results['status'];

			} else { echo $results['status']; }

	}

	if (isset($_GET['InsertCatBlog'])) {

		$results = BloGoBack\Back::CategoriaNueva($_POST['titulo'], 1);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['UpdateCatBlog'])) {

		$results = BloGoBack\Back::CategoriaUpdate($_GET['UpdateCatBlog'], $_POST['titulo']);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($results, true) ;

	}

	if (isset($_GET['delArtworks'])) {

	    $directorio = '../../artworks/publicaciones/';
	    unlink($directorio.explode(url_base."/artworks/publicaciones/", $_GET['delArtworks'])[1]);

	}

	if (isset($_GET['upArtworks'])) {

	    $directorio = '../../artworks/publicaciones/';
	    $filename = $_FILES["foto"]["name"];
	    $file_ext = substr($filename, strripos($filename, '.')); 

	    $newfilename = md5(date('l jS \of F Y h:i:s A').$filename). $file_ext;

	    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $directorio . $newfilename)) {

	            $archivo =  webPConvert($directorio . $newfilename, 70);
	            echo explode("artworks/publicaciones/", $archivo)[1];
	            unlink($directorio . $newfilename);


	    } else { echo 1; }

	}

	if (isset($_GET['InsertBlog'])) {

		$artworkDir = '../../artworks/publicaciones/';

		if($_FILES["foto"]["size"] > 0){  

			$filename = $_FILES["foto"]["name"];
			$file_basename = substr($filename, 0, strripos($filename, '.'));
			$file_ext = substr($filename, strripos($filename, '.')); 
			$filesize = $_FILES["foto"]["size"];
			$allowed_file_types = array('.png','.jpg','.gif','.jpeg'); 

			if ((in_array($file_ext, $allowed_file_types)) && ($filesize < 100000000000)){   

				$newfilename = md5(date('l jS \of F Y h:i:s A').$filename). $file_ext;

				if (file_exists($artworkDir . $newfilename)){ $results = "";  echo "1";} 
				else {  

					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $artworkDir . $newfilename)) {

						$archivo =  webPConvert($artworkDir . $newfilename, 70);

						$results = 	BloGoBack\Back::PublicacionNueva(
										array(
											"title" => $_POST['titulo'],
											"content" => $_POST['contenido'],
											"keywords" => $_POST['keywords'],
											"category" => $_POST['categoria'],
											"prologo" => $_POST['prologo'],
											"date" => date("Y-m-d H:i:s"),
											"img" => explode($artworkDir, $archivo)[1],
											"status" => $_POST['status']
										)
									);

			            unlink($artworkDir . $newfilename);

					} else { $results = "";  echo "1";}

				}

			} else { $results = "";  echo "1";}

		} else {	

			$results = 	BloGoBack\Back::PublicacionNueva(
							array(
								"title" => $_POST['titulo'],
								"content" => $_POST['contenido'],
								"keywords" => $_POST['keywords'],
								"category" => $_POST['categoria'],
								"prologo" => $_POST['prologo'],
								"date" => date("Y-m-d H:i:s"),
								"status" => $_POST['status']
							)
						);

		}


			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['UpdatePostBlog'])) {

		$artworkDir = '../../artworks/publicaciones/';

		if($_FILES["foto"]["size"] > 0){  

			$filename = $_FILES["foto"]["name"];
			$file_basename = substr($filename, 0, strripos($filename, '.'));
			$file_ext = substr($filename, strripos($filename, '.')); 
			$filesize = $_FILES["foto"]["size"];
			$allowed_file_types = array('.png','.jpg','.gif','.jpeg'); 

			if ((in_array($file_ext, $allowed_file_types)) && ($filesize < 100000000000)){   

				$newfilename = md5(date('l jS \of F Y h:i:s A').$filename). $file_ext;

				if (file_exists($artworkDir . $newfilename)){ $results = "";  echo "1";} 
				else {  

					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $artworkDir . $newfilename)) {

						$archivo =  webPConvert($artworkDir . $newfilename, 70);

						$results = 	BloGoBack\Back::PublicacionUpdate(
										$_GET['UpdatePostBlog'],
										array(
											"title" => $_POST['titulo'],
											"content" => $_POST['contenido'],
											"keywords" => $_POST['keywords'],
											"category" => $_POST['categoria'],
											"prologo" => $_POST['prologo'],
											"date" => date("Y-m-d H:i:s"),
											"img" => explode($artworkDir, $archivo)[1],
											"status" => $_POST['status']
										)
									);

			            unlink($artworkDir . $newfilename);

					} else { $results = "";  echo "1";}

				}

			} else { $results = "";  echo "1";}

		} else {	

			$results = 	BloGoBack\Back::PublicacionUpdate(
							$_GET['UpdatePostBlog'],
							array(
								"title" => $_POST['titulo'],
								"content" => $_POST['contenido'],
								"keywords" => $_POST['keywords'],
								"category" => $_POST['categoria'],
								"prologo" => $_POST['prologo'],
								"date" => date("Y-m-d H:i:s"),
								"status" => $_POST['status']
							)
						);

		}


			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['UpdateUserBlog'])) {


		if (empty($_POST['pass'])) {
			
			$data = [
			  "name" => $_POST['name'],
			  "level" => $_POST['level'],
			  "status" => $_POST['status']
			];

		} else {

			$data = [
			  "name" => $_POST['name'],
			  "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
			  "level" => $_POST['level'],
			  "status" => $_POST['status']
			];
			
		}

		$jreturn = BloGoBack\Back::UsuarioUpdate($_GET['UpdateUserBlog'], $data);
		echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['InsertUserBlog'])) {


		$results = 	BloGoBack\Back::UsuarioNuevo(
										[
											"name" => $_POST['name'],
											"user" => $_POST['user'],
											"pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
											"level" => $_POST['level'],
											"status" => 1
										]
									);


		if ($results == "") { $jreturn = array( 'status' => 0 ); }
		else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['SetTheme'])) {
		$jreturn = BloGoBack\Back::ConfigUpdate(["theme" => $_GET['SetTheme']]);
		if ($jreturn['theme'] == $_GET['SetTheme']) {echo json_encode(array('status' => 1), true);} 
		else { echo json_encode(array('status' => 0), true);}
	}

	if (isset($_GET['UpdateConfigBlog'])) {

		$jreturn = BloGoBack\Back::ConfigUpdate([
			   "sitio" => $_POST['sitio'],
			  "desc" => $_POST['desc'],
			  "ga" => $_POST['ga']

			]);

		if ($jreturn['sitio'] == $_POST['sitio']) {echo json_encode(array('status' => 1), true);} 
		else { echo json_encode(array('status' => 0), true);}

	}

	if (isset($_GET['Setup'])) {

		$jreturn = BloGoBack\Back::Setup($_POST);

		if ($jreturn == 1) {echo json_encode(array('status' => 1), true);} 
		else { echo json_encode(array('status' => 0), true);}

	}

?>