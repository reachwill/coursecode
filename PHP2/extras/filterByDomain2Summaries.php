<?php
$domainFilter = $_POST['domain_id'];
$domainStr = "(";
for($i=0;$i<count($domainFilter);$i++){
	$domainStr.="'".$domainFilter[$i]."',";
}

$domainStr = rtrim($domainStr, ',');
$domainStr .= ")";
$start = $_POST['start'];
$end = $_POST['end'];

$summary_data = array();



require_once('../config.php');
$con = new mysqli($dbIp, $user, $pwd,$db);

//first of all generate csv files containing all data ready for user downloading if they wish

//get all usage data in domain/date range

/*$sql = "SELECT registered_users.user_email,visits.phone,visits.duration,visits.visit_date,visits.visit_domain FROM registered_users, visits WHERE registered_users.user_id = visits.user_id AND visit_domain IN ".$domainStr;
if($start!=''){
	$sql.=" AND visit_date >= '".$start."'";
}

if($end!=''){
	$sql.=" AND visit_date <= '".$end."'";
}*/


//$result = mysql_query($sql);




if ( !$stmt = $con->prepare("SELECT registered_users.user_email,visits.phone,visits.duration,visits.visit_date,visits.visit_domain FROM registered_users, visits WHERE registered_users.user_id = visits.user_id AND visit_domain IN $domainStr AND visit_date >= ? AND visit_date <= ?") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("ss", $start,$end) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;




$fp = fopen('usage.csv', 'w');
$totalSecs = 0;
while($r = $result->fetch_assoc()) {
	$totalSecs+=$r['duration'];
    fputcsv($fp, $r);//save file ready for user to download
	
}
$totalSecsObj = new stdClass();
$totalSecsObj->type='totalSecs';
$totalSecsObj->value=($totalSecs);
array_push($summary_data,$totalSecsObj);

fclose($fp);

//$data = file_get_contents('usage.csv');
//echo $data;

//get all user registrations in domain/date range
/*$sql = "SELECT user_email,registration_date,user_domain,firstname,lastname FROM registered_users WHERE user_domain IN ".$domainStr;
if($start!=''){
	$sql.=" AND registration_date >= '".$start."'";
}

if($end!=''){
	$sql.=" AND registration_date <= '".$end."'";
}

$sql .= "  ORDER BY registration_date";

$result = mysql_query($sql);*/


if ( !$stmt = $con->prepare("SELECT user_email,registration_date,user_domain,firstname,lastname FROM registered_users WHERE user_domain IN $domainStr AND registration_date >= ?  AND registration_date <= ? ORDER BY registration_date") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("ss", $start,$end) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;








//$row = mysql_fetch_array($result);

$fp = fopen('registered-users.csv', 'w');

$numNewUsers = 0;
while($r = $result->fetch_assoc()) {
	$numNewUsers++;
    fputcsv($fp, $r);//save file ready for user to download
	
}
$newUsrObj = new stdClass();
$newUsrObj->type='numNewUsers';
$newUsrObj->value=$numNewUsers;
array_push($summary_data,$newUsrObj);

fclose($fp);

//now start querying summary data points



//numvisits
/*$sql = "SELECT COUNT(*) FROM registered_users, visits WHERE registered_users.user_id = visits.user_id AND visit_domain IN ".$domainStr;
if($start!=''){
	$sql.=" AND visit_date >= '".$start."'";
}

if($end!=''){
	$sql.=" AND visit_date <= '".$end."'";
}


$result = mysql_query($sql);
*/

if ( !$stmt = $con->prepare("SELECT COUNT(*) FROM registered_users, visits WHERE registered_users.user_id = visits.user_id AND visit_domain IN $domainStr AND visit_date >= ?  AND visit_date <= ?") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("ss", $start,$end) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;






$rows = array();
while($r = $result->fetch_assoc()) {
    $obj = new stdClass();
	$obj->type='numVisits';
	$obj->value=$r['COUNT(*)'];
	array_push($rows,$obj);
	
}
//echo json_encode($rows);

array_push($summary_data,$rows);

//views per package
/*$sql = "SELECT DISTINCT(phone) from visits";
$result = mysql_query($sql);*/

if ( !$stmt = $con->prepare("SELECT DISTINCT(phone) from visits") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;


$phones = array();
$phones2 = array();
$obj = new stdClass();
$obj->type='visitsPerPackage';
$obj->phones=array();
while($r = $result->fetch_assoc()) {
    
	$phones[] = $r['phone'];
	/*$sql = "SELECT COUNT(*) FROM visits WHERE phone = '".$r['phone']."'  AND visit_domain IN ".$domainStr;
	if($start!=''){
		$sql.=" AND visit_date >= '".$start."'";
	}
	
	if($end!=''){
		$sql.=" AND visit_date <= '".$end."'";
	}
	$q = mysql_query($sql);*/
	$p1 = $r['phone'];
		if ( !$stmt = $con->prepare("SELECT COUNT(*) FROM visits WHERE phone = ?  AND visit_domain IN  $domainStr AND visit_date >= ?  AND visit_date <= ?") ) 
	 echo "Prepare Error: ($con->errno) $con->error";
	if ( !$stmt->bind_param("sss",$p1, $start,$end) )
	  echo "Binding Parameter Error: ($con->errno) $con->error";
	if ( !$stmt->execute() ) 
	 echo "Execute Error: ($stmt->errno)  $stmt->error";
	 
	 $q = $stmt->get_result();
	
	$numRows = $result->num_rows;

	
	while($phone = $q->fetch_assoc()) {
		$obj2 = new stdClass();
		$obj2->phone=$r['phone'];
		$obj2->value=$phone['COUNT(*)'];
		array_push($obj->phones,$obj2);
		
	}
	

}
array_push($phones2,$obj);
array_push($summary_data,$phones2);


//unique visitors
/*$sql = "SELECT DISTINCT user_id from visits WHERE visit_domain IN ".$domainStr;
if($start!=''){
	$sql.=" AND visit_date >= '".$start."'";
}

if($end!=''){
	$sql.=" AND visit_date <= '".$end."'";
}
;

$result = mysql_query($sql);*/

if ( !$stmt = $con->prepare("SELECT DISTINCT user_id from visits WHERE visit_domain IN $domainStr AND visit_date >= ?  AND visit_date <= ?") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("ss", $start,$end) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $q = $stmt->get_result();

$numRows = $result->num_rows;

$uniqueVisits=array();
$obj = new stdClass();
$obj->type='uniqueUsers';
$num = 0;
while($visit = $result->fetch_assoc()) {
	$num++;
}
$obj->value=$num;
array_push($uniqueVisits,$obj);
array_push($summary_data,$uniqueVisits);





echo json_encode($summary_data);










?>