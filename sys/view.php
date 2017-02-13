<?php

	namespace X\Sys;

	class View extends \ArrayObject{ //cuando utilizamos un SPL (standard php library) tenemos que poner antes la barra "\"
		
		protected $output;
		protected $dataTable;

		public function __construct($dataView,$dataTable=null){

			parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS);

				if($dataTable!=null)
				{
					$this->dataTable=$dataTable;
				}

				//constructor del ArrayObject ^^^^
				//ens permet accedir al array de vista de forma que totes les variables es poden accedir mitjançant $this
			
		}

		public function render($fileview){
			ob_start();
	 		include APP.'tpl'.DS.$fileview; //   /app/tpl/template
	 		return ob_get_clean(); //ya tenemos la vista 
		}

		function show(){
			echo $this->output;
		}
	}