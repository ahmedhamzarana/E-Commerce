<?php
include("header.php");
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $_SESSION['user_name']; ?></h2>
            <p class="section-lead">Change information about yourself on this page.</p>

            <!-- Center Column -->
            <div class="row justify-content-center mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">

                    <!-- PROFILE PICTURE CARD -->
                    <div class="card profile-widget text-center mb-3">
                        <div class="profile-widget-header">
                            <img alt="image" src="assets/uploads/<?php echo $_SESSION['image']; ?>"
                                class="rounded-circle profile-widget-picture">
                        </div>
                    </div>

                    <!-- EDIT PROFILE CARD -->
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>First Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo $_SESSION['user_name']; ?>" required>
                                        <div class="invalid-feedback">Please fill in the first name</div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?php echo $_SESSION['email']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Change Profile Picture</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>

                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="<?php echo $_SESSION['phone']; ?>">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-12">
                                        <label>Password (Leave blank to keep current)</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="New Password">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer justi">
                                <button type="submit" name="update" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- End Center Column -->

        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include("footer.php");
?>