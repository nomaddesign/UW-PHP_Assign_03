<?php

namespace dbTest;

//Test autoload setup
require_once ('../Bootstrap.php');
	
	
class DbAccessTest extends \PHPUnit_Extensions_Database_TestCase {

require_once ('../Src/db/config.php');

public function ConnectTest() {	
		$db = new DbAccess ($db_config);
		
		$this->assertNotEmpty($db);
	}
	
	
	/*
$db = new db\DbAccess('127.0.0.1','assn2','mcdata','ci5ku6zu0show');
	
	// connect to database
	$db->connect();
	
	//
	$insertSql = "INSERT INTO User (firstname, lastname) VALUES ('Bob', 'Smith')";
	$rowId = $db->insert($insertSql);
	
	//
	$newRow = $db->select(sprintf("SELECT * FROM User WHERE id = %d", $rowId ));
	
	//Destruct DB Connection
	$db->disconnect();
	
	\var_dump ($newRow);
	
	// Should have at least one row
	assert(count($newRow) > 0);
*/
}



?>