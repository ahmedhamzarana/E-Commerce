<?php
include('header.php');
include('config.php');

// Fetch orders
$query = "
     SELECT 
        orders.order_id,
        orders.total_price,
        orders.shipping_address,
        orders.order_status,
        users.name,
        users.email,
        products.name AS product_name,
        products.price AS product_price,
        products.image As product_image
    FROM orders 
    INNER JOIN users ON orders.user_id = users.user_id 
    INNER JOIN products ON orders.product_id = products.id 
    ORDER BY orders.order_id DESC
";

$result = mysqli_query($con, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($con));
}
?>

<div class="main-content">
    <section class="section">
        <div class="row row-deck">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Orders</h4>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">

                            <table class="table table-striped">
                                <tr>
                                    <th>ORD #</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Product</th>
                                    <th>Product Price</th>
                                    <th>Total</th>
                                    <th>Address</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                                <?php while($row = mysqli_fetch_assoc($result)) : ?>

                                    <tr>
                                        <td><?= $row['order_id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['product_name'] ?></td>
                                        <td><?= $row['product_price'] ?></td>
                                        <td><?= $row['total_price'] ?></td>
                                        <td><?= $row['shipping_address'] ?></td>
                                        <td><img src="assets/uploads/<?= $row['product_image']; ?>" width="50"></td>
                                        <td><?= $row['order_status'] ?></td>

                                        <td>
                                            <a 
                                                href="order_details.php?order_id=<?= $row['order_id']; ?>" 
                                                class="btn btn-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>

                                <?php endwhile; ?>

                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>

<?php include("footer.php"); ?>
