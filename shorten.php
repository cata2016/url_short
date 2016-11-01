<?php  
require_once('connect.php');

$long_url = $_POST['long_url_post'];

$root_URL = 'http://shot-link.cu.cc/?id=';


function randomString($length = 6) {
	$str = '';
	
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	
	$max = count($characters)-1;
	
	for($i=0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}

	return $str;
}

if($long_url != NULL) {

	$short_url = randomString();

	$insert = 	"INSERT INTO main_table(url_lung, url_scurt, nr_accesari,data_generare,utlima_accesare) 
	VALUES ('".$long_url."','".$short_url."','0','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";

	if($conn->query($insert) === TRUE) {
		echo $root_URL.$short_url;
	} else {
		echo $conn->error;
	}

}




?>