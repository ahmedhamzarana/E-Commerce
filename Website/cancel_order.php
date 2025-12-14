<?php
include('../Admin/config.php');

if (isset($_GET['id'])) {  // check for 'id' since your URL uses ?id=1

    $order_id = $_GET['id'];

    $query = "DELETE FROM `orders` WHERE order_id = $order_id";

    if (mysqli_query($con, $query)) {
        header("Location: order_confimation.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

} else {
    echo "Order ID missing";
}
?>