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

//now for the update mysql using php

if(isset($_POST['newUsername']) || isset($_POST['newPassword'])){
//first detects if there is a new password input

$newUsername = $_POST['newUsername'];
$newPassword = $_POST['newPassword'];

//now this is how the magic happens 

$sql = "UPDATE users SET 
username = '$newUsername',
password = '$newPassword'
WHERE id = '$id'";  // we update the datas using update and set where we base the user? using the id sessioned already from the login 

//now execute the mysql 

mysqli_query($cann , $sql);

//to refresh the whole page 

header("Location: update.php");
exit(); // simply reaload




}

if(isset($_POST['next'])){

    header("location: user.php");
    exit();

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
    
    <h1>Name: <?php echo ' ' . $username; ?></h1>
    <h1>Password: <?php echo  ' ' . $password; ?></h1>

    <h2>Update your username and password</h2>

    <form  method="post">
        <input type="text" placeholder="Enter new username" name="newUsername"> <br>
        <input type="password" placeholder="Enter new password" name="newPassword">

        <button type="submit">Confirm</button>
    </form>

    <form  method="post">
        <button name="next">Next</button>
    </form>

</body>
</html>
