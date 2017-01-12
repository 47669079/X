<?php
	namespace X\Sys;
	
	/**
	* Core: Front Controller
	*
	*  @author: toni
	*  @package:sys
	*
	*
	**/

	use X\Sys\Request;
	use X\App\Controllers\Error;

	class Core{

		//Sempre necessita 3 parametres

		static private $controller;
		static private $action;
		static private $params;


		public  static function init(){
			
			Request::exploding();
			//$arrayquery preparat per extreure controlador


			self::$controller=Request::getVariable();
			//$arrayquery preparat per extreure el controlador

			self::$action=Request::getVariable();
			
			self::$params=Request::getParams();
			//self es una forma de acceder a alguna funcion metodo variable o atributo de la misma clase como son estáticos la forma de acceder es self::

			//El acceso estático es muy útil pero tenemos que tener cuidado porque abusar de ello haria relentizar la aplicación

			//var_dump(self::$params);


			
			// Fer routing			
			self::router();
		}
		/**
		* router: Looks for controller and action
		*
		*
		*
		*/
		static function router(){
			//si no hi ha controller busquem 'home'
			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
			//trobar controladors
			$filename=strtolower(self::$controller).'.php';
			$fileroute=APP.'controllers'.DS.$filename;
		
			if(is_readable($fileroute)){
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				// cal cridar ara l'accio
				if (is_callable(array(self::$controller,self::$action))){
					call_user_func(array(self::$controller,self::$action));
				}
				else{ echo self::$action.': Mètode inexistent';}
			}else{
				self::$controller=new Error(self::$params);
				//hem de buscar un métode que interpreti si hi ha un métode inexsistent o no

				//self es una forma de acceder a alguna funcion metodo variable o atributo de la misma clase como son estáticos la forma de acceder es self::

			//El acceso estático es muy útil pero tenemos que tener cuidado porque abusar de ello haria relentizar la aplicación

			//var_dump(self::$params);
				
			}
		}
	}
