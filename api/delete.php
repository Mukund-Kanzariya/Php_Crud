<?php

$id=$_GET['id'];

$connection = mysqli_connect('localhost','root','','test');

$query = "DELETE FROM `users` WHERE id='$id'";

mysqli_query($connection, $query);

header("location:../index.php");
?>