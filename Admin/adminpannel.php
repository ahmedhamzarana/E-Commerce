<?php 
include('header.php');
include('config.php');

$pending = "SELECT MAX(order_id) AS max_order_id FROM orders WHERE order_status = 'pending'";
$pending_result = mysqli_query($con, $pending);
$Pending_items = mysqli_fetch_assoc($pending_result);

$shipping = "SELECT MAX(order_id) AS max_order_id FROM orders WHERE order_status = 'shipping'";
$shipping_result = mysqli_query($con, $shipping);
$shipping_items = mysqli_fetch_assoc($shipping_result);

$completed = "SELECT MAX(order_id) AS max_order_id FROM orders WHERE order_status = 'completed'";
$completed_result = mysqli_query($con, $completed);
$completed_items = mysqli_fetch_assoc($completed_result);

$total = "SELECT MAX(order_id) AS max_order_id FROM orders";
$total_result = mysqli_query($con, $total);
$total_items = mysqli_fetch_assoc($total_result);

$total_query = "SELECT SUM(price) AS total_price FROM products";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_assoc($total_result);

?>
<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order Statistics -
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                <?php 
                                    if(empty($Pending_items['max_order_id'] == 0)){
                                        echo $Pending_items['max_order_id'];
                                    }else{
                                        echo "0";
                                    }
                                ?>
                                </div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                <?php
                                    if (empty($shipping_items['max_order_id'] == 0)) {
                                        echo $shipping_items['max_order_id'];
                                    } else {
                                        echo "0";
                                    }
                                ?>
                                </div>
                                <div class="card-stats-item-label">Shipping</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">
                                <?php
                                    if (empty($completed_items['max_order_id'] == 0)) {
                                        echo $completed_items['max_order_id'];
                                    } else {
                                        echo "0";
                                    }                                
                                ?>
                                </div>
                                <div class="card-stats-item-label">Completed</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Orders</h4>
                        </div>
                        <div class="card-body">
                            <?php
                                if (empty($total_items['max_order_id'] == 0)) {
                                    echo $total_items['max_order_id'];
                                } else {
                                    echo "0";
                                }                                
                            ?>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Balance</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_row['total_price'];?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sales</h4>
                        </div>
                        <div class="card-body">
                            4,732
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php include('footer.php'); ?>