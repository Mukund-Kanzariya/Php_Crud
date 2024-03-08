<?php

$name=$_POST['username'];
$password=$_POST['password'];

$connection = mysqli_connect('localhost','root','','test');

$insert = "INSERT INTO users(username,password) VALUES ('$name','$password')";
    
$result=mysqli_query($connection, $insert);
?>