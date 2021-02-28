<?php 

	namespace BloGoBack{

		use \SleekDB\Store as DBController;

		class Back {

			public static function LogIn($user, $pass){
				$blogUsers = new DBController('blogUsers', "../database");
				$results = $blogUsers->findOneBy(['user', '=', $user]);
				if (isset($results['_id'])) {
					if (password_verify($pass, $results['pass'])){
							$arrays = array(
								'idusuario' => $results['_id'],
								'name' => $results['name'],
								'level' => $results['level'],
								'status' => 1
							);
					} else { $arrays = array('status' => 2); }
				} else { $arrays = array('status' => 0); }
			    return $arrays;
			}

			public static function DashboardData(){
				$blogPost = new DBController('blogPost', "./database");
				$count = $blogPost->findAll();
					$queryBuilder = $blogPost->createQueryBuilder();
					$queryBuilder->limit(5);
					$queryBuilder->orderBy(["_id" => "desc"]);
					$query = $queryBuilder->getQuery();
					$result = $query->fetch();
				return array('data' => $result, 'count' => count($count) );
			}

			public static function CategoriasData(){
				$blogCategorias = new DBController('blogCategorias', "./database");
				$results = $blogCategorias->findAll();
				return array('data' => $results, 'count' => count($results) );
			}

			public static function CategoriaNueva($titu, $st){
				$blogCategorias = new DBController('blogCategorias', "../database");
				return $blogCategorias->insert([
				  "title" => $titu,
				  "status" => $st
				]);
			}

			public static function CategoriaVer($id){
				$blogCategorias = new DBController('blogCategorias', "../admin/database");
				return $blogCategorias->findOneBy(["_id", '=', intval($id)]);
			}

			public static function CategoriaUpdate($id, $data){
                $blogCategorias = new DBController('blogCategorias', "../database");
                return $blogCategorias->updateById(intval($id), ["title" => $data]);
            }

			public static function PublicacionesData(){
				$blogPost = new DBController('blogPost', "./database");
				return $blogPost->findAll();
			}

			public static function PublicacionNueva($data){
				$blogCategorias = new DBController('blogPost', "../database");
				return $blogCategorias->insert($data);
			}

			public static function PublicacionaVer($id){
				$blogPost = new DBController('blogPost', "../admin/database");
				return $blogPost->findOneBy(["_id", '=', intval($id)]);
			}

			public static function PublicacionUpdate($id, $data){
                $blogPost = new DBController('blogPost', "../database");
                return $blogPost->updateById(intval($id), $data);
			}

			public static function UsuariosData(){
				$blogUsers = new DBController('blogUsers', "./database");
				$results = $blogUsers->findAll();
				return array('data' => $results, 'count' => count($results) );
			}

			public static function UsuarioUpdate($id, $data){
				$blogUsers = new DBController('blogUsers', "../database");
				return $blogUsers->updateById($id, $data);
			}

			public static function UsuarioNuevo($data){
				$blogUsers = new DBController('blogUsers', "../database");
				return $blogUsers->insert($data);
			}

			public static function ConfigUpdate($data){
                $blogCategorias = new DBController('blogConfig', "../database");
                return $blogCategorias->updateById(1, $data);
            }

			public static function ConfigData(){
                $blogUsers = new DBController('blogConfig', "./database");
				$results = $blogUsers->findAll();
				return array('data' => $results, 'count' => count($results) );
            }

			public static function Setup($data){

                $blogConfig = new DBController('blogConfig', "../database");
                $blogUsers = new DBController('blogUsers', "../database");

                $postC = [

                	'sitio' => $data['sitio'],
                	'desc' => $data['desc'],
                	'url' => $data['url'],
                	'theme' => "html5up-future-imperfect",
                	'ga' => $data['ga'],
                	'setup' => 1,

                ];

                $postU = [
					"name" => $data['name'],
					"user" => $data['user'],
					"pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
					"level" => 1,
					"status" => 1
				];


				if (($blogConfig->insert($postC)) && ($blogUsers->insert($postU))) { return 1; }
				else { return 0; }

            }

		}

	}

	namespace BloGoFront{

		use \SleekDB\Store as DBController;

		class Front{

			public static function FrontSite($limit = 10, $order = "desc"){
				$blogPost = new DBController('blogPost', "./admin/database");
				$count = $blogPost->findAll();
					$queryBuilder = $blogPost->createQueryBuilder();
					$queryBuilder->limit($limit );
					$queryBuilder->orderBy(["_id" => $order]);
					$query = $queryBuilder->getQuery();
					$result = $query->fetch();
				return array('data' => $result, 'count' => count($count) );
			}

			public static function CategoriasData(){
				$blogCategorias = new DBController('blogCategorias', "./admin/database");
				$results = $blogCategorias->findAll();
				return array('data' => $results, 'count' => count($results) );
			}

			public static function CategoriaVer($id){
				$blogCategorias = new DBController('blogCategorias', "./admin/database");
				$blogPost = new DBController('blogPost', "./admin/database");
				$cate = $blogCategorias->findOneBy(["_id", '=', intval($id)]);
				$post = $blogPost->findBy(["category", "=", $id]);
				return $array = array( 'post' => $post, 'cate' => $cate );
			}

			public static function Categorias(){
				$blogCategorias = new DBController('blogCategorias', "./admin/database");
				return $blogCategorias->findAll();
			}

			public static function PublicacionaVer($id){
				$blogPost = new DBController('blogPost', "./admin/database");
				return $blogPost->findOneBy(["_id", '=', intval($id)]);
			}

			public static function ConfigData(){
                $blogUsers = new DBController('blogConfig', "./admin/database");
				$results = $blogUsers->findAll();
				return array('data' => $results, 'count' => count($results) );
            }

		}

		class Installer{ }

	}





?>