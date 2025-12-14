<?php
include('header.php');

?>
<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="row row-deck">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Clints</h4>
                        <div class="card-header-action">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <?php
                            include "config.php";
                            $query = "SELECT * FROM users WHERE role='user'";
                            $result = mysqli_query($con, $query);
                            $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <?php if (!empty($items)): ?>
                                    <?php foreach ($items as $row): ?>
                                        <tr>
                                            <td>UID - <?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo '<div class="badge badge-success">Active</div>';
                                                } else {
                                                    echo '<div class="badge badge-warning">Inactive</div>';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td>
                                                <img src="assets/uploads/<?php echo $row['image'] ?>" width="50"
                                                    class="rounded-circle">
                                            </td>
                                            <td>
                                                <?php if ($row['status'] == 0): ?>
                                                    <a href="activate_user.php?id=<?php echo $row['user_id']; ?>"
                                                        class="btn btn-primary">Activate</a>
                                                <?php else: ?>
                                                    <a href="deactivate_user.php?id=<?php echo $row['user_id']; ?>"
                                                        class="btn btn-warning">Deactivate</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8">No users found</td>
                                    </tr>
                                <?php endif; ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Debra Stewart</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include('footer.php');

?>