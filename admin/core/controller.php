<?php 

	if (isset($_GET['LogIn'])) {

		$results = $blogUsers
		->where( 'user', '=', $_POST['inputUser'] )
		->fetch();

		if (isset($results[0]['_id'])) {

			if (password_verify($_POST['inputPassword'], $results[0]['pass'])){

					$_SESSION['idusuario'] = $results[0]['_id'];
					$_SESSION['name'] = $results[0]['name'];
					$_SESSION['level'] = $results[0]['level'];

					$arrays = array('status' => 1);

			} else { $arrays = array('status' => 2); }

		} else { $arrays = array('status' => 0); }

	    echo json_encode($arrays, true);

	}

	if (isset($_GET['InsertBlog'])) {

		$results = 	$blogPost->insert([
					  "title" => $_POST['titulo'],
					  "content" => $_POST['contenido'],
					  "keywords" => $_POST['keywords'],
					  "category" => $_POST['categoria'],
					  "status" => $_POST['status']
					]);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['GetThisPostBlog'])) {

		$results = $blogPost
					->where( '_id', '=', $_GET['GetThisPostBlog'] )
					->fetch();
		
	    echo json_encode($results, true) ;

	}

	if (isset($_GET['GetDashPostBlog'])) {
		
		$count = $blogPost->fetch();
		$results = $blogPost->limit( 5 )->orderBy('DESC')->fetch();
		$array = array('data' => $results, 'count' => count($count) );
			
	    echo json_encode($array, true);

	}

	if (isset($_GET['UpdatePostBlog'])) {

		$results = 	$blogPost->where( '_id', '=', $_GET['UpdatePostBlog'] )->update([

					  "title" => $_POST['titulo'],
					  "content" => $_POST['contenido'],
					  "keywords" => $_POST['keywords'],
					  "category" => $_POST['categoria'],
					  "status" => $_POST['status']

					]);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['GetAllCatBlog'])) {
		
		$results = $blogCategorias->fetch();
		$array = array('data' => $results);
	    echo json_encode($array, true);

	}

	if (isset($_GET['InsertCatBlog'])) {

		$results = 	$blogCategorias->insert([
					  "title" => $_POST['titulo'],
					  "status" => 1
					]);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['GetAllPostBlog'])) {
		
		$results = $blogPost->orderBy('DESC')->fetch();

		$array = array('data' => $results);
			
	    echo json_encode($array, true);

	}

	if (isset($_GET['GetThisCatBlog'])) {

		$results = $blogCategorias
					->where( '_id', '=', $_GET['GetThisCatBlog'] )
					->fetch();

		
	    echo json_encode($results, true) ;

	}

	if (isset($_GET['UpdateCatBlog'])) {

		$results = 	$blogCategorias->where( '_id', '=', $_GET['UpdateCatBlog'] )->update([

					  "title" => $_POST['titulo']

					]);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true);
	    
	}

	if (isset($_GET['GetConfigBlog'])) {
		
		$results = $blogConfig->fetch();

		$array = array('data' => $results);
			
	    echo json_encode($array, true);

	}

	if (isset($_GET['UpdateConfigBlog'])) {

		if (!$blogConfig->fetch()) {

			$results = 	$blogConfig->insert([
			   "sitio" => $_POST['sitio'],
			  "desc" => $_POST['desc'],
			  "ga" => $_POST['ga']

			]);

		} else {

			$results = 	$blogConfig->where( '_id', '=', 1 )->update([
			  "sitio" => $_POST['sitio'],
			  "desc" => $_POST['desc'],
			  "ga" => $_POST['ga']
			]);
			
		}


			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['GetAllUsersBlog'])) {
		
		$results = $blogUsers->orderBy('DESC')->fetch();

		$array = array('data' => $results);
			
	    echo json_encode($array, true);

	}

	if (isset($_GET['InsertUserBlog'])) {

		$results = 	$blogUsers->insert([
					  "name" => $_POST['name'],
					  "user" => $_POST['user'],
					  "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
					  "level" => $_POST['level'],
					  "status" => 1
					]);

			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}

	if (isset($_GET['GetThisUserBlog'])) {

		$results = $blogUsers
					->where( '_id', '=', $_GET['GetThisUserBlog'] )
					->fetch();

		
	    echo json_encode($results, true) ;

	}

	if (isset($_GET['UpdateUserBlog'])) {


		if (empty($_POST['pass'])) {
			
			$results = 	$blogUsers->where( '_id', '=', $_GET['UpdateUserBlog'] )->update([
			  "name" => $_POST['name'],
			  "level" => $_POST['level'],
			  "status" => $_POST['status']
			]);

		} else {

			$results = 	$blogUsers->where( '_id', '=', $_GET['UpdateUserBlog'] )->update([
			  "name" => $_POST['name'],
			  "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
			  "level" => $_POST['level'],
			  "status" => $_POST['status']
			]);
			
		}


			if ($results == "") { $jreturn = array( 'status' => 0 ); }
			else { $jreturn = array( 'status' => 1, 'data' => $results ); }
		
	    echo json_encode($jreturn, true) ;

	}
?>