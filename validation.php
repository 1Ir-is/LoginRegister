<?php

session_start();

$con = mysqli_connect('localhost','root','','loginregister');
//Check connection
if (mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}

$name = $_POST['user'];
$pass = $_POST['password'];
$s = " select * from usertable where name = '$name' && password = '$pass' "; 
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
//$location=$num==1?'location: home.php' : 'location: login.php';
//header($location);
if($num==1){
    $_SESSION['username'] = $name;
    header('location: home.php');

}
else{
    header('location: login.php');
}
?>