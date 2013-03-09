<?php 

namespace db;

use \PDO as PDO;


class dbLite {

	public $db_name, $table_name, $data, $STH, $DBH;

	public function connect($db_path) {
		try{
			$DBH = new PDO("sqlite:".$db_path); 
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			/* return $DBH; */
			
		} catch(PDOException $e) {  
    		echo "PDO Connection Error: ".$e;
		}
	}//END function connect
	
	public function insert($table_name, $data ){
	
		try {
		$this->DBH->prepare("INSERT INTO commits (id, sha, message, author, commiter) value (:id,:sha,:message,:author,:commiter)");  
		return $this->DBH->execute($data);  
		} catch(PDOException $e) {  
    		echo "PDO Connection Error: ".$e;
		}
	}//END function insert

	

}//end class

?>