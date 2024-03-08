<?php

$id=$_POST['id'];

$name=$_POST['username'];
$password=$_POST['password'];

$connection = mysqli_connect('localhost','root','','test');

$query = "UPDATE `users` SET username='$name' , password='$password' WHERE id='$id' ";

mysqli_query($connection, $query);

// header("location:../index.php");
echo "updated...";
?>