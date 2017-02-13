<?php

//VARIABLES GLOBALES DEL FRAMEWORK

	namespace X;

	require_once __DIR__.'/sys/autoload.php';

	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(__DIR__).DS);
	//Si volem accedir al sistema de fitchers encara que no sabem quin és
	define('APP',ROOT.'app'.DS);
		//app es la ruta del sistema per accedir a una carpeta determinada
	define('APP_W',dirname($_SERVER['PHP_SELF']).'/');
	
	//define('APP_W', base(dirname($SERVER['PHP_SELF'])));

	//funcio per comprobar si directori base o no
	/*function is_base(){
		if(){
			return false;
		}else{

		}return true;
	}*/
