<?php

$response = array();

require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));

$db = new DB_CONNECT();

$result = mysqli_query($con, "SELECT distinct username, password from soa_login", MYSQLI_STORE_RESULT) or die(mysql_error($con));

if (mysqli_num_rows($result) > 0){

	$response["UserDetails"] = array();

	while ($row = mysqli_fetch_array($result)) {
		$product = array();
        $product["username"] = $row["username"];
        $product["password"] = $row["password"];
        array_push($response["UserDetails"], $product);
	}
	

	echo json_encode($response);
}else{
	$response["success"] = 0;
	$response["message"] = "No Users Found !";

	echo json_encode($response);
}

?>