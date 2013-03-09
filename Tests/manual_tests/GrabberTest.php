<?php

namespace Grabber;

error_reporting( E_ALL | E_STRICT );
ini_set('display_errors','On');
ini_set('display_startup_errors','On');

require_once ('Grabber.php');

/* require_once ('../../Bootstrap.php'); */

echo 'hi';

$myTest = new GrabbIt();

$myFile = $myTest->requestIt('https://api.github.com/repos/nomaddesign/Oscillator_Data_Builder/commits');

file_put_contents ($_SERVER['DOCUMENT_ROOT'].'/assignment_03/Data/commits.json',json_encode($myFile));

echo $_SERVER['DOCUMENT_ROOT'];

?>