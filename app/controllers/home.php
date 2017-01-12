<?php

   namespace X\App\Controllers;

   use X\Sys\Controller; //!!! cuando queremos utilizar una clase tendremos que poner use


   class Home extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->dataView=array(
               'title'=>'Home',
               'name'=>'Olalla');
   			$this->model=new \X\App\Models\mHome(); //INSTANCIA
   			$this->view =new \X\App\Views\vHome($this->dataView);
   		}

   		function home(){
   			
   		}
   }
