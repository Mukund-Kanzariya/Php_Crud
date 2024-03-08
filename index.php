<?php

$connection = mysqli_connect('localhost','root','','test');

$query="SELECT * FROM users";

$result=mysqli_query($connection, $query);

$data=mysqli_fetch_all($result, MYSQLI_ASSOC);

$index=0;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous"> -->
</head>
<body>
    <form>
        <label for="username">username</label>
        <input type="text" id="username" name="username">
        <label for="password">password</label>
        <input type="password" id="password" name="password">
    <button onclick="insert()">submit</button>
    </form>                     
    

     <table border="2" style="margin-top:50px">
        <thead>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th colspan="2">operations</th>
        </thead>
        <tbody>
            <?php foreach ($data as $row) {?>
            <tr>
                <td><?=  ++$index ?></td>
                <td><?=  $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><button class="container btn btn-danger" value="submit" name="submit"><a href="api/delete.php ? id=<?=  $row['id'] ?>"> Delete</a></button></td>
                <td><button class="container btn btn-danger" value="submit" name="submit"><a href="api/updatepage.php ? id=<?= $row['id']?>">Update</a></button></td>
            </tr>
           
<?php } ?>
        </tbody>    
    </table>
</body>

<script>
        function insert() {

                let name=$('#username').val();
                let password=$('#password').val();
                
                let data = {
                    username:name,
                    password:password
                };
                
                $.ajax({
                    url:'./api/insert.php',
                    type:'post',
                    data:data,
                    success:function(response) {
                        console.log(response);
                        if(response)
                        console.log('inserted...');
                        else 
                        console.log('not inserted...');
            }
        });
        }  
         
</script>
</html>
      <!-- <td><?= $index += 1?></td> -->
                <!-- <?php 
                $id=$row['id'];
                $name=$row['username'];
                $password=$row['password'];
                ?>
                <td><?= $id?></td>
                <td><?=  $name?></td>
                <td><?=  $password?></td>
             -->