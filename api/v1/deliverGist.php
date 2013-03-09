<?php

// Provide API end point
$localAPIServer = new ApiServer();

// set up routing, use an associative array to list out all possible end point
// You don't need to do this if you use slim or Restler to set up the routing
$routingMap = array();

$routingMap['listGist'] = new EndPoint('');

// invoke routing map, return response in json
$localAPIServer->serve( $routingMap )->json();

public function listGist() {
    $dao = new MyAwesomeDao();
    $rows = $dao->select('SELECT * FROM gists');
    return $rows;
}

?>