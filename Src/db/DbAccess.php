<?php

namespace db;

use \PDO as PDO;


class DbAccess extends PDO {
	
		 
	private $hostname; 	// @var string
	private $database;	// @var string
	private $username;	// @var string
	private $password;	// @var string
	private $db_engine;	// @var string
	private	$db_file; 	// @var string -- file location for sqllite file
	private $rows;		// @array
	public $result;		// object
	
	
	/**
     * Connect to the database
     * Return Sql driver
     *
     * @$db_connect array 
     *
     */
	public function __construct(array $db_connect) {
		$this->db_engine = $db_connect['db_engine'];
		$this->db_file	= $db_connect['db_file'];
		$this->hostname = $db_connect['hostname'];
		$this->database = $db_connect['database'];
		$this->username = $db_connect['username'];
		$this->password = $db_connect['password'];
	}
	
	/**
     * Connect to the database
     * Return Sql driver
     *
     */
	public function connect(){
		try {
			if ($this->db_engine === 'mysql'){
				# MySQL with PDO_MYSQL  
				$this->dbh = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password );
			} 
			elseif ($this->db_engine === 'sqlite'){
				# SQLlite with PDO_SQLlite
				$this->dbh = new PDO('sqlite:'.$this->db_file);
			}//END if/else 
			
			//Set Error Mode
			//	$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
				
		} catch(\PDOException $e) {
		    throw new \RuntimeException( 'Failed to establish database connection:'. $e->getMessage() );
		}// END Try/Catch	  
		
		return $this->dbh;
	}


	/**
     * return the result of a select query. 
     *    
     * This function may return an array of rows, an array of models that represent the tables or rows.
     */
	public function select($query, $data) {
		//SetUp Array for results
		$results = array();
		
		try {
			$statement = $this->dbh->prepare($query);//Build PDO Statement
			$statement->execute($data);//execute
			$statement->setFetchMode(PDO::FETCH_ASSOC); 
			//Loop through fetched rows
			while ($row = $statement->fetch()){
				array_push($results, $row);
			}
		} catch(\PDOExceptionn $e) {
		    throw new \RuntimeException( 'Failed to select record(s):'. $e->getMessage() );
		}// END Try/Catch
		
		return $results; 
		
	}//END function select
	
	
	
	/**
	* execute the update sql statement.
	* It should throw an exception if the query fails to execute.
	*/  
	public function update($query) {
		try {
			$statement = $this->dbh->prepare($query);
			$updateResult = $statement->execute($data); 
			/* return $updateResult; */			
		} catch(\PDOException $e) {
		    die( 'Failed to update record:'. $e->getMessage() );
		}// END Try/Catch
		
	}//END function update



	// execute the delete sql statement. It should throw an exception if the query fails to execute.
	public function delete($query) {
		try {
			$deleteResult = $this->dbh->exec($query);
		} catch(\PDOException $e) {
		    throw new \RuntimeException( 'Failed to delete record:'. $e->getMessage() );
		}// END Try/Catch
		
		return $deleteResult; 
	}//END function update
	
	
	
	/*
	*execute insert sql statement. 
	*It should return last insert id if operation is successful, 
	*or throw an exception if the operation fails.
	* 
	*@ $query - sql querry string
	*/
	public function insert($query) {
		try {
			$num = $this->dbh->exec($query);
			$insertResultID = $this->dbh->lastInsertId();
		} catch(\PDOException $e) {
	    	throw new \RuntimeException( 'Failed to update record:'. $e->getMessage() );
		}// END Try/Catch
		
		return $insertResultID;
	}
	
	// shutdowns established database connection
	public function disconnect(){  
		# close the connection
		try {
			$this->dbh = null;
		} catch(\PDOException $e) {
		    throw new \RuntimeException( 'Failed to close connection:'. $e->getMessage() );
		}
	}
	  
}//END class DbAccess
?>