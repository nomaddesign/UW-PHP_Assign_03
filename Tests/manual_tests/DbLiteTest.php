<?php 

error_reporting( E_ALL | E_STRICT );
ini_set('display_errors','True');
ini_set('display_startup_errors','On');

require_once('../../Bootstrap.php');
require_once('dbLite.php');

echo 'HI<br/>'.PHP_EOL;


$data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/assignment_03/Data/commits.json');



/*
//$handle = new \db\dbLite();
//$connect_h = $handle->connect('../../sql_lite_files/github.db');
*/

$temp_data = array(
			"id"=>"2",
			"sha"=>"173fbb6197e56a5f8a8be38e19491656faff84b3",
			"message"=>"Test222222222",
			"author"=>"nomaddesign@gmail.com",
			"commiter"=>"nomaddesign@gmail.com",
		);
// $connect_h->insert('commits', $temp_data); 

		try {
			$DBH = new PDO('sqlite:/Volumes/tenacious/Library/Server/Web/Data/Sites/WebClass/assignment_03/sql_lite_files/github.db'); 
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		} 
		catch(PDOException $e) {
			echo "PDO Connection Error: ".$e->getMessage();
		}
		
/*
		try {
			$statement = $DBH->prepare('INSERT INTO commits(id, sha, message, author, commiter) VALUES(:id,:sha,:message,:author,:commiter)');  
			
			$statement->execute($temp_data); 
		} catch(PDOException $e) {
			echo "PDO Connection Error: ".$e->getMessage();
		}//end catch

		
	 var_dump($statement);
*/
		
		
	try {
			$query = $DBH->query('SELECT id, message, author FROM commits');  
			
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			
			//$statement->execute($temp_data); 
		} catch(PDOException $e) {
			echo "PDO Connection Error: ".$e->getMessage();
		}//end catch		
		var_dump($results);
		
echo 'BYE';
?>
