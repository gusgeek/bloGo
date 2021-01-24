<?php 
	
	session_start();

   	// error_reporting(0);

	//Directory a Database
    
		$dataDir = "../database";

	// INIT Database

		$blogPost = \SleekDB\SleekDB::store('blogPost', $dataDir);
		$blogConfig = \SleekDB\SleekDB::store('blogConfig', $dataDir);
		$blogUsers = \SleekDB\SleekDB::store('blogUsers', $dataDir);
		$blogCategorias = \SleekDB\SleekDB::store('blogCategorias', $dataDir);
?>