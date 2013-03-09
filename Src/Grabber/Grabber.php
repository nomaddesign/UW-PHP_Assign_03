<?php

namespace Grabber;

require_once '../../Bootstrap.php';

use \Guzzle\Http\Client;

class GrabbIt {

	public $client;
	public $request;
	public $response;
	public $URL;

	public function requestIt($URL){
		// Create a client and provide a base URL
		$client = new Client($URL);
		
		//repos/{userName}/{repoName}/commits
		$request = $client->get();
		
		// Send the request and get the response
		try {
			$response = $request->send();
		}catch (Guzzle\Http\Exception\BadResponseException $e) {
			echo 'API Fetch Error: ' . $e->getMessage();
		}	
		
		 return $response->json();
		 
		 /* return \var_dump(\json_decode($response->getBody())); */
		
		/* return \var_dump($response); */
	}
}//END class Grabber



?>