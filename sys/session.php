<?php
	namespace X\Sys;
	
	class Session{
		//funcio inicial que s'encarregui d'iniciar la sessió dins del sistema

		static function init(){
			session_start(); //com podem fer perque guardi el identificador de sessió en algún lloc després de fer el session start

			self::set('id',session_id());

			//també guardem la variable de sessió (php sesit? cookie en el navegador > variable de sessió en el servidor)

		}


		//funciones típicas del tipo set y get

		static function set($key,$value){
			$_SESSION[$key]=$value;
		}

		static function get($key){
			if(self::exist($key)){
				return $_SESSION[$key];
			}
			else{
				return null;
			}
		}

		static function exist($key){ //funció de suport
			//si existeix la clau
			if(array_key_exists($key, $_SESSION)){
				return true;
			}else{
				return false;
			}
		}
		static function del($key){ 
		//esborrar una variable de sessió

			if (self::exist($key)){
				unset($_SESSION[$key]);
			}
		}

		static function destroy(){ 
		//desconectamos la session (eliminamos todas las variables de sesión)
			
			session_destroy();
		}
	}