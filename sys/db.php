<?php

	namespace X\Sys;

	class DB extends \PDO{ // PDO es una extensión de php, no está dentro de X, está fuera por eso se indica así

		static $instance;

		public function __construct(){

			//recuperem informació de configuració (config.json) un cop s'ha recuperat aquesta informació es crea la construccio basada en el PDO

			$config = Registry::getInstance();
			$dbconf = (array)$config->dbconf; //he de convertir un objecte en un array, en dbconf tindré un array de configuració del sistema

			$dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
			$usr=$dbconf['dbuser'];
			$pass=$dbconf['dbpass'];

				parent::__construct($dsn,$usr,$pass);
			

		}

		static function singleton(){ //només un acces simultani, si está aquest acces utilitzarem la instancia

			if(!(self::$instance instanceof self)){ //si no es una instancia de si mateix

				self::$instance = new self();
			}

				return self::$instance;
		}

	}