<?php include('header.php') ?>

<style>
    h2,
    h3 {
        color: #d32f2f;
    }

    .card {
        border-radius: 10px;
    }
</style>
<?php
$user_id = $_SESSION['user_id'];
$query = "SELECT
                orders.order_id,
                orders.total_price,
                orders.shipping_address,
                orders.order_status,
                users.name,
                users.email,
                products.name AS product_name,
                products.price AS product_price,
                products.image AS product_image,
                orders.user_id 
            FROM orders
            INNER JOIN users ON orders.user_id = users.user_id
            INNER JOIN products ON orders.product_id = products.id
            WHERE users.user_id = '$user_id'";
$result = mysqli_query($con, $query);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);




?>
<?php if (empty($items)) { ?>
    <!-- No Orders Message -->
    <div class="container py-5">
        <div class="card p-5 text-center mx-auto"
            style="max-width: 500px; background: linear-gradient(135deg, #fff9e6 0%, #ffffff 100%);">
            <i class="bi bi-inbox" style="font-size: 5rem; color: #ffa726;"></i>

            <h2 class="mt-4 mb-3 fw-bold" style="color: #f57c00;">
                No Orders Found
            </h2>

            <p class="lead text-secondary mb-4">
                There are no orders available. Please go back and continue shopping.
            </p>

            <a href="index.php" class="btn btn-outline-danger btn-lg fw-semibold shadow-sm"
                style="border-radius: 50px; padding: 14px 40px;">
                <i class="bi bi-arrow-left-circle me-2"></i>
                Back to Home
            </a>
        </div>
    </div>

<?php } else { ?>
    <?php foreach ($items as $row) { ?>
        <div class="container py-5">

            <header class="card p-4 p-sm-5 text-center mb-4">
                <i class="bi bi-check-circle-fill text-success mx-auto mb-3" style="font-size: 3rem;"></i>
                <h1 class="display-6 fw-bold text-dark mb-2">Order Confirmed!</h1>
                <p class="lead text-secondary">Your order has been successfully placed. Thank you for shopping with us.</p>
                <div class="mt-4 d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                    <div class="bg-success-subtle text-success border border-success-subtle fw-semibold px-4 py-2 rounded-3">
                        Order ID: <span class="font-monospace tracking-wider">#ORD-<?php echo $row['order_id']; ?></span>
                    </div>
                </div>
            </header>

            <main class="row g-4">

                <div class="col-lg-8">
                    <section class="card p-4 p-sm-5 mb-4">
                        <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-3">Order Summary</h2>

                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-0 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="../Admin/assets/uploads/<?php echo $row['product_image']; ?>"
                                        alt="<?php echo $row['product_name']; ?> Image" class="rounded-3 border"
                                        style="width:60px; height:80px; object-fit:cover;">
                                    <div>
                                        <p class="fw-semibold text-dark mb-0"><?php echo $row['product_name']; ?></p>
                                        <small class="text-secondary">Product Details Here</small>
                                        <span class="badge badge-featured mt-1">Status:
                                            <?php echo $row['order_status']; ?></span>
                                    </div>
                                </div>
                                <span class="fw-medium text-dark">Rs:<?php echo $row['product_price']; ?></span>
                            </li>
                        </ul>

                        <div class="pt-3 border-top border-dashed">
                            <div class="d-flex justify-content-between pt-3">
                                <p class="h5 fw-bold text-dark mb-0">Order Total</p>
                                <p class="order-total-amount mb-0">Rs:<?php echo $row['total_price']; ?>.00</p>
                            </div>
                        </div>
                    </section>
                    <div class="mt-4 d-grid gap-3 d-sm-flex">
                        <?php
                        if ($row['order_status'] == 'pending') {
                            ?>
                            <a href="cancel_order.php?id=<?php echo $row['order_id']; ?>"
                                class="btn btn-danger btn-lg fw-semibold shadow-sm flex-fill">Cancelled Order</a>
                            <?php
                        } else {
                            ?>
                            <a href="##" hidden class="btn btn-danger btn-lg fw-semibold shadow-sm flex-fill">Cancelled Order</a>

                            <?php
                        }
                        ?>
                        <div class="m-2"></div>
                        <a href="index.php" class="btn btn-outline-danger btn-lg fw-semibold shadow-sm flex-fill">Continue
                            Shopping</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <section class="card p-4 mb-4">
                        <h3 class="h5 fw-bold text-dark mb-4 border-bottom pb-3">Shipping Details</h3>
                        <div class="d-grid gap-3">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                                <div>
                                    <p class="fw-medium text-dark mb-1">Delivery Address</p>
                                    <p class="text-secondary mb-0"><?php echo $row['name']; ?></p>
                                    <p class="text-secondary mb-0"><?php echo $row['shipping_address']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>

    <?php } // End of product loop ?>
<?php } ?>

<?php include('footer.php'); ?>