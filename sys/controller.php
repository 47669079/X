<?php
	namespace X\Sys;

	use X\Sys\Registry;
	/**
	*
	*   Controller: the base controller
	*     in MVC systems
	*
	*
	*
	**/
	class Controller{
		protected $model;
		protected $view;
		protected $params;
		protected $dataView;
		protected $conf;

			//CON SINGLETON

		function __construct($params,$dataView=null){
			$this->dataView=$dataView;
			$this->params=$params;
			$this->conf=Registry::getInstance();
			//la diferencia con el new es que comprueba si existe o no la instancia

		}

		//la funció inicial de ob_clean fa una neteja inicial del buffer de sortida, si hi ha un echo l'esborra perquè quan s'envia en ajax resulta que l'aplicació envia una capcelera json

		//els metodes ajax fan que els documents dom es comuniquin amb la font de dades (servidor)

		function ajax($output){
			ob_clean();
			if(is_array($output)){
				echo json_encode($output); //convertim un array asociatiu en un objecte json per traspasar les dades del servidor al client
				
			}
		}

	}