

<?php 

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

        $sql = "INSERT INTO users (username , password) VALUES ('$username' , $password)";


        mysqli_query($cann , $sql);
        header("Location: select.php");
        exit();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username"> 
        <br>
        <input type="password" name="password">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>