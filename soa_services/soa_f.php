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
 
// get all products from products table
$result = mysqli_query($con, "SELECT distinct Department FROM subject_class", MYSQLI_STORE_RESULT) or die(mysql_error($con));
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["name"] = $row["Department"];
        array_push($response, $product);
    }
    // success
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>