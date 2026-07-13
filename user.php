<?php 
session_start();





$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_db');

if(!$cann){
    die("Connection Failed");
}

$foodNameShow = '';
$foodPriceShow = '';
$foodStatusShow = '';

if(isset($_POST['order'])){

    $user_id = $_SESSION['id'];
    $foodName = $_POST['foodName'];
    $foodPrice = $_POST['foodPrice'];
    $foodStatus = $_POST['foodStatus'];

    $sql = "INSERT INTO orders (foodName , foodPrice , foodStatus) VALUES ('$foodName' , '$foodPrice' , '$foodStatus')";

    

    mysqli_query($cann , $sql);

    }


if(isset($_POST['refresh'])){


$show = "SELECT * FROM orders WHERE user_id = $user_id";

$result = mysqli_query($cann , $show);

$orderData = mysqli_fetch_assoc($result);

$foodNameShow = $orderData['foodName'];
$foodPriceShow = $orderData['foodPrice'];
$foodStatusShow = $orderData['foodStatus'];


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
        <h1>Burger</h1>
        <input type="hidden" name="foodName" value="burger">
        <input type="hidden" name="foodPrice" value="20">
        <input type="hidden" name="foodStatus" value="pending">
        <button name="order">Order</button>
    </form>



<form  method="post">

<h1>My orders</h1>

<h2>Order: <?php echo  ' ' . $foodNameShow; ?> </h2>
<h2>Price: <?php echo  ' ' . $foodPriceShow; ?> </h2>
<h2>Status: <?php echo  ' ' . $foodStatusShow; ?> </h2>


<button name="refresh">Refresh</button>

</form>

</body>
</html>
