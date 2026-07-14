<?php

$cann = mysqli_connect('localhost', 'root', '', 'practice_db');

if(!$cann){
    die("Connection Failed");
}

/* -------------------------
   ACCEPT ORDER
--------------------------*/

if(isset($_POST['accept'])){

    $orderId = $_POST['orderId'];

    $accept = "UPDATE orders
               SET foodStatus='Preparing'
               WHERE id='$orderId'";

    mysqli_query($cann, $accept);

    header("Location: vendor.php");
    exit();
}


/* -------------------------
   DENY ORDER
--------------------------*/

if(isset($_POST['deny'])){

    $orderId = $_POST['orderId'];

    $deny = "UPDATE orders
             SET foodStatus='Denied'
             WHERE id='$orderId'";

    mysqli_query($cann, $deny);

    header("Location: vendor.php");
    exit();
}


/* -------------------------
   SHOW ALL ORDERS
--------------------------*/

$sql = "SELECT * FROM orders ORDER BY id DESC";

$result = mysqli_query($cann, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vendor Dashboard</title>
</head>
<body>

<h1>Vendor Dashboard</h1>

<?php

while($order = mysqli_fetch_assoc($result)){

?>

<form method="POST" style="border:1px solid black; margin:15px; padding:15px;">

    <!-- This tells PHP which order was clicked -->
    <input
        type="hidden"
        name="orderId"
        value="<?php echo $order['id']; ?>"
    >

    <h2>Order #<?php echo $order['id']; ?></h2>

    <p>User ID: <?php echo $order['user_data']; ?></p>

    <p>Food: <?php echo $order['foodName']; ?></p>

    <p>Price: ₱<?php echo $order['foodPrice']; ?></p>

    <p>Status: <?php echo $order['foodStatus']; ?></p>

    <button name="accept">
        Accept
    </button>

    <button name="deny">
        Deny
    </button>

</form>

<?php

}

?>

</body>
</html>