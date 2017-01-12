<?php
	// developer mode
	error_reporting(E_ALL);
	ini_set('display_errors',1);

	//config file
	require_once 'x.inc.php';

	use \X\Sys\Autoload; //es como si fuera un import de java
	use \X\Sys\Core;

	$loader=new Autoload();
	$loader->register();

	//Registre de Namespace de ruta actual
	$loader->addNamespace('X\Sys','sys');
	$loader->addNamespace('X\App','app');
	$loader->addNamespace('X\App\Controllers','app/controllers');
	$loader->addNamespace('X\App\Models','app/models');
	$loader->addNamespace('X\App\Views','app/views');	
	//CON SINGLETON

	//$config=Registry::getInstance(); //la diferencia con el new es que comprueba si existe o no la instancia
	//var_dump($config);
	//$config=new Registry(); //aquest sería el lloc per col·locar-ho	
	
	Core::init();