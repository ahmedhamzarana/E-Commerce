<?php
include('config.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = '$id'";

    if(mysqli_query($con, $query)){
        echo "<script>alert('Product Deleted Successfully');
        window.location.href='add_products.php';</script>";
    } else {
        echo "Delete Error: " . mysqli_error($con);
    }

}else{
    echo "Product ID Missing";
}

mysqli_close($con);
?>
