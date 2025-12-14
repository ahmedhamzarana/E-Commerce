<?php
include("header.php");


if (!isset($_SESSION['user_id'])) {
    echo "<div class='alert alert-danger'>You must login first!</div>";
    exit;
}

if (!isset($_GET['add'])) {
    echo "<div class='alert alert-danger'>Error: No valid product selected.</div>";
    exit;
}


$user_id = $_SESSION['user_id'];
$selected_product_id = $_GET['add'];

$query_user = "SELECT * FROM users WHERE user_id = ' $user_id'";
$result_user = mysqli_query($con, $query_user);
$user = mysqli_fetch_assoc($result_user);

$query_product = "SELECT * FROM products WHERE id = '$selected_product_id'";
$result_product = mysqli_query($con, $query_product);
$product = mysqli_fetch_assoc($result_product);

if (!$user || !$product) {
    echo "<div class='alert alert-danger'>Error: User or Product not found.</div>";
    exit;
}


if (isset($_POST['place_order'])) {


    $shipping_address = $_POST['address'] ?? $user['address'];


    $safe_address = $shipping_address;
    $total_price = $product['price'];

    $query_insert_order = "
        INSERT INTO orders (user_id, product_id, total_price, shipping_address)
        VALUES (
            '$user_id', 
            '$selected_product_id', 
            '$total_price', 
            '$safe_address'
        )
    ";


    if (mysqli_query($con, $query_insert_order)) {
        echo "<script>window.location.href='order_confimation.php';</script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Order placement failed: " . mysqli_error($con) . "</div>";
    }
}


?>
<div class="container py-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Place Order</h3>

        <form method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="product_id" value="<?php echo $selected_product_id; ?>">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" disabled
                        value="<?php echo $user['name']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" disabled
                        value="<?php echo $user['email']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Shipping Address</label>
                    <input type="text" name="address" class="form-control" required
                        value="<?php echo $_POST['address'] ?? $user['address']; ?>">
                    <small class="form-text text-muted">Please confirm or update your delivery address.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="work_phone" class="form-control" disabled
                        value="<?php echo $user['phone']; ?>">
                </div>
                <div class="col-md-12 md-3">

                    <h5>Product Details</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="img-box">
                        <img src="../Admin/assets/uploads/<?php echo $product['image']; ?>" alt="" width="100">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text" class="form-control" disabled value="<?php echo $product['name']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Product Price</label>
                    <input type="text" class="form-control" disabled value="<?php echo $product['price']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <input type="text" class="form-control" disabled value="<?php echo $product['category']; ?>">
                </div>
            </div>

            <button type="submit" name="place_order" class="btn btn-danger w-100 p-2 mt-4">
                Confirm & Place Order for <?php echo $product['price']; ?>
            </button>

        </form>
    </div>
</div>

<?php
include("footer.php");
?>