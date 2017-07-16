<?php

/*
 * Following code will list all the products
 */
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
// connecting to db
$db = new DB_CONNECT();





	$result = mysqli_query($con, "SELECT distinct bookName FROM `soa_books` b", MYSQLI_STORE_RESULT)  or die(mysql_error($con));



// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["DATA"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["name"] = $row["bookName"];

 
        // push single product into final response array
        array_push($response["DATA"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}

?>

