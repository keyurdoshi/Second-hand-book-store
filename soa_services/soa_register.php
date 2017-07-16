<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $name=$_POST['name'];
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 if($name == '' || $username == '' || $email == '' || $password == '' || $phone == ''){
 echo 'please fill all values';
 }else{
require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
// connecting to db
$db = new DB_CONNECT();
 $sql = "SELECT * FROM soa_login WHERE username='$username'";
 $check = mysqli_fetch_array(mysqli_query($con,$sql));
 if(isset($check)){
 echo 'Same username product already exist';
 }else{ 
 $sql = "INSERT INTO soa_login (name,username,email,password,phone) VALUES('$name','$username','$email','$password','$phone')";
 if(mysqli_query($con,$sql)){
 echo 'successfully registered';
 }else{
 echo 'oops! Please try again!';
 }
 }
 mysqli_close($con);
 }
}else{
echo 'error';
}