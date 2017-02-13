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
		protected $dataView=array();
		protected $dataTable=array();
		protected $conf;
		protected $app;

			//CON SINGLETON

		function __construct($params=null,$dataView=null){

			//$this->dataView=$dataView;

			$this->params=$params;
			$this->conf=Registry::getInstance();
			$this->app=(array)$this->conf->app;
			$this->addData($this->app);

			//la diferencia con el new es que comprueba si existe o no la instancia

		}

		//la funció inicial de ob_clean fa una neteja inicial del buffer de sortida, si hi ha un echo l'esborra perquè quan s'envia en ajax resulta que l'aplicació envia una capcelera json

		//els metodes ajax fan que els documents dom es comuniquin amb la font de dades (servidor)

		protected function addData($array){
			if(is_array($array)){

				if($this->is_single($array) && is_array($this->dataView)){
					$this->dataView=array_merge($this->dataView,$array);
				}

				else{
					$this->dataTable=$array;
				}

				}

			else{

				$this->dataView=$array;

			}

		}

		protected function multipleData($mdata){

			for($i=0;$i<count($mdata);$i++)
			{
				foreach ($mdata[$i] as $key => $value) {
					$result[$key.$i]=$value;
				}
			}

			return $result;

		}

		//array 2D o 3D

		protected function is_single($data){

			foreach ($data as $value) {
				if(is_array($value))
				{
					return false;

					// Si el valor que tenemos en el array, es otro array retornará falso.

				}

				else{

					return true;

					//si el valor que tenemos en el array es un valor y nada más

				}
			}

		}

		function error(){

			$this->msg='Error. Action not defined';

		}

		function ajax($output){

			ob_clean();

			if(is_array($output)){
				
				echo json_encode($output); //convertim un array asociatiu en un objecte json per traspasar les dades del servidor al client
				
			}
		}

	}