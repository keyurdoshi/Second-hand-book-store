<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $bookName = $_POST['name'];
 $bookAuthor = $_POST['author'];
 $bookPrice = $_POST['price'];
 //$bookOwner = $_POST['bookOwner']; 
require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php'; 
$sql = "INSERT INTO soa_books (bookName,bookAuthor,bookPrice) VALUES('$bookName','$bookAuthor','$bookPrice')";
if(mysqli_query($con,$sql)){
echo 'successfully Added';
}else{
echo 'oops! Please try again!';
}
mysqli_close($con);
}else{
echo 'error';
}