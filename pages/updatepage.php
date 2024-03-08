<?php

$id=$_GET['id'];

$connection = mysqli_connect('localhost','root','','test');

$query="SELECT * FROM `users` WHERE id='$id'";

$result=mysqli_query($connection, $query);

$data=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<form>
        <input type="hidden" id="id" value="<?= $id ?>">
        <label for="username">username</label>
        <input type="text" id="username" name="username" value="<?= $data['username']?>"/>
        <label for="password">password</label>
        <input type="password" id="password" name="password" value="<?= $data['password']?>"/>
        <button type="button" onclick="update()">Update</button>
    </form> 
</body>
<script>
        function update() {

                let id=$('#id').val();
                let name=$('#username').val();
                let password=$('#password').val();
                
                let data = {
                    id:id,
                    username:name,
                    password:password
                };
                
                $.ajax({
                    url:'../api/update.php',
                    type:'post',
                    data:data,
                    success:function(response) {
                        console.log(response);
                        if(response)
                        {
                            console.log('updated......');
                            // window.location.href = "../index.php"
                        }
                        else 
                        console.log('not updated......');
            }
        });
        }  
</script>
</html>
