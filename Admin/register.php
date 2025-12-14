<!DOCTYPE html>
<html lang="en">

<!-- auth-register.html  Tue, 07 Jan 2020 03:39:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; CodiePie</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-4">

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2>Register</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="">First Name</label>
                                            <input id="" type="text" class="form-control" name="name" autofocus
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="phone">Phone Number</label>
                                            <input id="phone" type="phone" class="form-control" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="address">Address</label>
                                            <input id="address" type="text" class="form-control" name="address"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Profile Image</label>
                                        <input id="image" type="file" class="form-control" name="image" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-lg btn-block">Register</button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    have an account? <a href="login.php">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include "config.php";

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // IMAGE
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $folder = "assets/uploads/" . $image;
            move_uploaded_file($tmp, $folder);
        }
        $query = "INSERT INTO users(name,email,password,phone,address,image)
              VALUES('$name','$email','$password','$phone','$address','$image')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('User Registered Successfully');</script>";
            echo "<script>window.location='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    ?>

    ?>
    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="assets/js/CodiePie.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- auth-register.html  Tue, 07 Jan 2020 03:39:48 GMT -->

</html>