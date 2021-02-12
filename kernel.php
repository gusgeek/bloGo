<?php 

	require_once("./admin/core/framework/SleekDB/SleekDB.php");

	// INIT Database

		$adminDataDir = "./admin/database"; 

		$blogPost = \SleekDB\SleekDB::store('blogPost', $adminDataDir);
		$blogConfig = \SleekDB\SleekDB::store('blogConfig', $adminDataDir);
		// $blogUsers = \SleekDB\SleekDB::store('blogUsers', $adminDataDir);
		$blogCategorias = \SleekDB\SleekDB::store('blogCategorias', $adminDataDir);

		$results = $blogConfig->where( '_id', '=', 1 )->fetch()[0];
  		

?>