<?php

	//VIEW ERROR
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	/************************************************/
	/*	 SESSIONS		*/
	/************************************************/

	//IF SESSIONS DON'T EXIST
	if(!isset($_SESSION)){

		//INIT SESSIONS TIME (7 DAYS)
		$ttl = (3600 * 24 * 7);
		//$local_sessions_save_path = dirname(dirname(dirname(__FILE__))).'/session-twt'; //PROD
		$local_sessions_save_path = ini_get('session.save_path').'/session-twt'; //LOCAL

		if(!file_exists($local_sessions_save_path)) mkdir($local_sessions_save_path);

		session_set_cookie_params($ttl);
		ini_set('session.gc_maxlifetime', $ttl);
		ini_set('session.save_path', $local_sessions_save_path);

		//SESSIONS
		session_start();
	}
	$refw = isset($_GET['r'])?$_GET['r']:'';
if($refw != '')
	$_SESSION['r'] = $refw;

	//LOAD PARAMETERS
	require_once(dirname(__FILE__) . '/config.php');