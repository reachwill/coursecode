<?php
$a[]='Anna';
$a[]='Britney';
$a[]='Cinderella';
$a[]='Diana';
$a[]='Eva';
$a[]='Fiona';

$q = $_GET['q'];

$hint = '';
if(strlen($q) > 0){
	
	$numItems = count($a);
	for($i=0 ; $i < $numItems; $i++){
		if(strtolower($q)==strtolower(substr($a[$i],0,strlen($q)))){
			if($hint==''){
				$hint=$a[$i];	
			}else{
				$hint = $hint . ',' . $a[$i];
			}
		}
	}
}

if($hint==''){
	$response = 'No suggestions';	
}else{
	$response = $hint;	
}

echo $response;












?>