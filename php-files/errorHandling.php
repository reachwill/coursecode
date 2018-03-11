<?php

function customError($errno, $errstr, $errfile, $errline){
	echo 'Whoops unhandled error: '. $errline;
}

set_error_handler('customError');

echo $test;

?>