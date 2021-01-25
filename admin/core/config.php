<?php 
	
	session_start();

   	// error_reporting(0);

   	$artworkDir = "../../artworks/";

	//Directory a Database

	$adminDataDir = "../database"; 

	// INIT Database

		$blogPost = \SleekDB\SleekDB::store('blogPost', $adminDataDir);
		$blogConfig = \SleekDB\SleekDB::store('blogConfig', $adminDataDir);
		$blogUsers = \SleekDB\SleekDB::store('blogUsers', $adminDataDir);
		$blogCategorias = \SleekDB\SleekDB::store('blogCategorias', $adminDataDir);
?>