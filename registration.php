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
$s = " select * from usertable where name = '$name'"; 
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num>0){
    echo "Username already taken";
}
else{
    $reg = "insert into usertable(name, password) values ('$name', '$pass')";
    mysqli_query($con, $reg);
    echo "Successfull";
}
?>