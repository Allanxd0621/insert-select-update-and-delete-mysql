<?php 
session_start();

$id = $_SESSION['id'];

$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_db');
if(!$cann){
    die("Connection Failed");
}

$transferData = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($cann , $transferData);

$datas = mysqli_fetch_assoc($result);

$username = $datas['username'];
$password = $datas['password'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Name: <?php echo ' ' . $username; ?></h1>
    <h1>Password: <?php echo  ' ' . $password; ?></h1>

</body>
</html>