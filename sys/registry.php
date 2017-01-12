<?php
	namespace X\Sys;
	/**
	 * 
	 * 
	 * Registry: stores app information
	 * 
	 * @author Toni
	 * 
	 * 
	 * */

	//actúa como registro del sistema, array asocitativo que está disponible para toda la aplicación pero desde la que sólo se puede acceder desde una instancia, implementamos una funcion para obtener la instancia (getinstance)
	 
	 class Registry{

//tiene que soporar singleton y tiene que tener un array

	 	 private $data=array();
	 	 static $instance;
	 	 //la instancia está feta a través d'un acces estàtic, esta variable és pública
	 	 // singleton instance
	 	 public static function getInstance(){ //si hay una instancia la retorna, si no la crea y la retorna.
	 	 	// there is no instance?
	 	 	if (!(self::$instance instanceof self)){
	 	 		self::$instance=new self();
	 	 		return self::$instance;
	 	 	}else{
	 	 		return self::$instance;
	 	 	}
	 	 }

	 	 //Afegir a registry amb funcions màgiques, les funcions màgiques serveixen per afegir/Donar metodes als valors per cuan s'estan utilitzar métodes d'afegir a l'array uns valors

	 	 function __construct(){ //crea un array y lo pone como atributo del registry

	 	 	$this->data=array();
	 	 	$this->loadConf();
	 	 }

	 	 //methods __set($key,$value) //siempre que tiene las __ es una funcion mágica, si existe la clave la meterá dentro del array

	 	 function __set($key,$value){ //no es pot utilitzar el set sobre una variable que no existeix
	 	 	if(!array_key_exists($key, $this->data)) //si no existeix a data l'afegim
	 	 		{
	 	 			$this->data[$key]=$value;
	 	 		}
	 	 }

	 	 //methods __get($key)
	 	 //con el set estamos guardando la clave y el valor del array que hemos creado arriba en el constructor, si está vacío

	 	 function __get($key){
	 	 	if(array_key_exists($key, $this->data)){
	 	 		return $this->data[$key]; //retorna el valor del data de la key
	 	 	}else{
	 	 		return null; //nos retornarà null cuando busquemos una key que no exista
	 	 	}
	 	 }


		//con el get obtendremos la clave

	 	 function __unset($key=null){ // puede borrar un elemento de registro a través de su clave 
	 	 								//que pueden poner parametro o no
	 	 	if($key!=null){
	 	 		if(array_key_exists($key,$this->data)){
	 	 			//$idx=array_search($key,$this->data);
	 	 			unset($this->data[$key]);
	 	 		}
	 	 	}
	 	 	else{
	 	 		unset($this->data);
	 	 	}
	 	 }
	 	 function loadConf(){
	 	 	$file= APP.'config.json';
	 	 	$jsonStr=file_get_contents($file);
	 	 	
	 	 	
	 	 	
	 	 }
	 }

