<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mHome extends Model{
		public function __construct(){
			parent::__construct();
			
		}

		public function getRoles(){

			$sql="SELECT * FROM roles";
			$this->query($sql);

			$res=$this->execute();

			if($res){
				$result=$this->resultSet();
			}
			else{
				$result=null;
			}

			return $result;

		}
	}