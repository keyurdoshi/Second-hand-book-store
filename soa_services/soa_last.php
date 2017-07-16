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
 	
	
	$name = $_POST["NAME"];
    $use = "SELECT bookOwner from soa_books where bookName='$name'";
 $result = mysqli_query($con, $use, MYSQLI_STORE_RESULT);
  while($row = mysqli_fetch_array($result)){
    $userbin=$row['bookOwner'];}
    $use = "SELECT phone from soa_login where name='$userbin'";
 $result = mysqli_query($con, $use, MYSQLI_STORE_RESULT);
  while($row = mysqli_fetch_array($result)){
    $userbin2=$row['phone'];}
	 $result = mysqli_query($con, "SELECT * FROM soa_books where bookName='$name'", MYSQLI_STORE_RESULT);



// check for empty result

	if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["DATA"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
		$product["BOOK_NAME"] = $row["bookName"];
		$product["AUTHOR"] = $row["bookAuthor"];
		$product["PRICE"] = $row["bookPrice"];
		$product["DESC"] = $row["bookDesc"];
        $product["OWNER"] = $userbin;
        $product["PHONE"] = $userbin2;
		

 
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

