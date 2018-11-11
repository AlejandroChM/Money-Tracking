<?php 
/**
 * index.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/** *//**
	 * hace llamados de los archivos ubicados en app
	 */	
	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT", realpath(dirname(__FILE__)).DS);
	define("APP_PATH", ROOT."app".DS);

	require_once(APP_PATH."Config.php");
	require_once(APP_PATH."Request.php");
	require_once(APP_PATH."Bootstrap.php");
	require_once(APP_PATH."Controller.php");
	require_once(APP_PATH."Model.php");
	require_once(APP_PATH."View.php");
	require_once(APP_PATH."Database.php");

	try {
		Bootstrap::run(new Request);
		} catch (Exception $e) 
		{
		echo $e->getMessage();
		}
?>