<?php 

session_start();

$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_db');

if(!$cann){
    die("Connection Failed");
}

$error = false;


if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = true;
    }

    if(!$error){

        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($cann , $sql);

        $userData = mysqli_fetch_assoc($result);

        if($userData && $password == $userData['password']){

            $_SESSION['id'] = $userData['id'];

            header("Location: update.php");
            exit();

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form  method="post">
        <input type="text" name="username"> <br>
        <input type="password" name="password">

        <button type="submit">Log in</button>
    </form>

</body>
</html>