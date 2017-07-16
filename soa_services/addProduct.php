<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $name = $_POST['name'];
 $category = $_POST['category'];
 $price = $_POST['price'];
 $description = $_POST['description'];
 $bookOwner = $_POST['bookOwner'];
 if($name == '' || $category == '' || $price == '' || $description == '' || $bookOwner ==''){
 echo 'please fill all values';
 }else{
	 require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
// connecting to db
$db = new DB_CONNECT();
 $sql = "SELECT * FROM soa_books WHERE name='$name'";
 $check = mysqli_fetch_array(mysqli_query($con,$sql));
 if(isset($check)){
 echo 'Same name product already exist';
 }else{ 
 $use = "SELECT name from soa_login where username = '$bookOwner'";
 $result = mysqli_query($con, $use, MYSQLI_STORE_RESULT);
  while($row = mysqli_fetch_array($result)){
  	$bin=$row['name'];}
  	
 $sql = "INSERT INTO soa_books (bookName,bookAuthor,bookPrice,bookDesc,bookOwner) VALUES('$name','$category','$price','$description','$bin')";
 if(mysqli_query($con,$sql)){
 echo 'successfully Added';
 }else{
 echo 'oops! Please try again!';
 }
 }
 mysqli_close($con);
 }
}else{
echo 'error';
}