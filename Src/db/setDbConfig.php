<?php

namespace db;

/*
* Config Class
*/
class DbConf {

	/*
	* Sets DB Connection parameters 
	*
	* @string $db_engine_type
	*/
	function set($db_engine_type = "sqlite"){
	
		if $db_engine_type == "mysql"){
			$db_config = array(
				'db_engine' => 'mysql',
				'db_file' => null,
	            'hostname'     => '127.0.0.1',
	            'database'   => 'assn2',
	            'username' => 'mcdata',
	            'password' => 'ci5ku6zu0show'  
			);
		} elseif $db_engine_type == "sqllite"){
			$db_config = array(
				'db_engine' => 'sqllite',
				'db_file' 	=> 'assignment2.db',
				'hostname'	=> '',
	            'database'	=> '',
	            'username'	=> '',
	            'password'	=> ''
			);
		}//end else/if
		
	return $db_config; 
			
	}//END Function setConfig	            
}
?>