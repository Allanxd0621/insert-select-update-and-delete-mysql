<?php 
$cann = mysqli_connect('localhost' , 'root' , '' ,'practice_db');

if(!$cann){
    die("Connection Failed");
}

//after connecting we will make the accept and deny updates

if(isset($_POST['accept'])){

    $orderId = $_POST['orderId'];

    $accept = "UPDATE orders SET
                foodStatus = 'Preparing'
                WHERE id = '$orderId'";

    mysqli_query($cann , $accept);

    header("Location: vendorp.php");
    exit();

}

if(isset($_POST['deny'])){

    $orderId = $_POST['orderId'];

    $deny = "UPDATE orders SET
    foodStatus = 'denied'
    WHERE id = '$orderId'";

    mysqli_query($cann , $deny);

    header("Location: vendorp.php");
    exit();

}





$sql = "SELECT * FROM orders ORDER BY id DESC"; // literally means select all

$result = mysqli_query($cann , $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

while($order = mysqli_fetch_assoc($result)){
    //while true it makes this form 
?>


<form method="post">

<input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">
<!-- placeholder for the id -->

<h2>Order #<?php echo $order['id']; ?></h2>

<p>User id: <?php echo $order['user_data'] ?></p>
<p>Food: <?php echo $order['foodName']; ?></p>
<p>Price: ₱<?php echo $order['foodPrice']; ?></p>
<p>Status: <?php echo $order['foodStatus']; ?></p>

<button name="accept">Accept</button>
<button name="deny">Deny</button>

</form>











<?php
}
?>

</body>
</html>