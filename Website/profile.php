<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Minimalist User Profile Management Page" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            /* Light Gray Background */
        }

        .profile-card {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Subtle Gray Shadow */
            border-radius: 12px;
            border: 1px solid #dee2e6;
            /* Light Gray Border */
            overflow: hidden;
        }

        .profile-image-container {
            position: relative;
            text-align: center;
            padding: 20px;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            /* White border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .status-badge {
            font-size: 1rem;
            padding: .5rem 1rem;
            /* Using a dark background for contrast, but keeping it grayscale */
            background-color: #343a40 !important;
            /* Dark gray/black for high contrast */
            color: #fff;
        }

        .card-header-bg {
            height: 100px;
            background-color: #e9ecef;
            /* Very Light Gray Header */
            border-bottom: 1px solid #dee2e6;
        }

        /* Overriding Primary/Success colors to grayscale */
        .text-primary,
        .btn-primary {
            color: #212529 !important;
            /* Dark Gray Text */
            border-color: #343a40 !important;
        }

        .btn-success {
            background-color: #343a40 !important;
            border-color: #343a40 !important;
            color: #fff !important;
        }

        .btn-success:hover {
            background-color: #495057 !important;
            border-color: #495057 !important;
        }

        .border-end {
            border-right: 1px solid #dee2e6 !important;
        }
    </style>
    <title>My Profile - Minimalist</title>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4 text-dark fw-bold">My Profile 🔳</h2>

        <div class="card profile-card">
            <div class="row g-0">

                <div class="col-md-4 border-end bg-white rounded-start">
                    <div class="card-header-bg"></div>
                    <div class="profile-image-container mt-n5">

                        <img src="../Admin/assets/uploads/<?php echo $_SESSION['image']; ?>" alt="Profile Picture"
                            class="profile-image mb-3">

                        <h5 class="fw-bold mb-0 text-dark"><?php echo $_SESSION['user_name'] ?></h5>

                        <?php
                        $status_value = isset($_SESSION['status']);
                        $status_text = ($status_value == 1) ? 'Active' : 'Active';
                        ?>
                        <span class="badge status-badge mb-4">
                            Status: <?php echo $status_text; ?>
                        </span>

                        <hr class="mx-4 text-secondary">

                        <div class="text-start p-3">
                            <h6 class="text-dark mb-3"><i class="fas fa-info-circle me-2"></i> Account Details</h6>
                            <ul class="list-unstyled small">
                                <li class="mb-2 text-dark"><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?>
                                </li>
                                <li class="mb-2 text-dark"><strong>Email:</strong> <?php echo $_SESSION['email']; ?>
                                </li>
                                <li class="mb-2 text-dark"><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?>
                                </li>
                                <li class="mb-2 text-dark"><strong>Address:</strong>
                                    <?php echo $_SESSION['address']; ?></li>
                                <li class="text-dark"><strong>Joined:</strong> <?php echo $_SESSION['created_at']; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 p-4 bg-white">
                    <h4 class="mb-4 text-dark"><i class="fas fa-pen-to-square me-2"></i> Update Your Profile</h4>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class=" col-lg-6">
                                <label for="name" class="form-label fw-bold text-dark">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $_SESSION['user_name'] ?>" required>
                            </div>
                            <div class=" col-lg-6">
                                <label for="email" class="form-label fw-bold text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $_SESSION['email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6">
                                <label for="name" class="form-label fw-bold text-dark">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $_SESSION['phone'] ?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="address" class="form-label fw-bold text-dark">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?php echo $_SESSION['address'] ?>">
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold text-dark">New Password (optional)</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Leave blank to keep current password">
                        </div>

                        <hr class="my-4 text-secondary">

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold text-dark">Change Profile Picture</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="updateprofile" class="btn btn-success btn-lg">
                                <i class="fas fa-upload me-2"></i> Update Profile
                            </button>
                        </div>

                    </form>
                    <?php


                    $user_id = $_SESSION['user_id'];

                    if (isset($_POST['updateprofile'])) {

                        $name = $_POST['name'];
                        $password = $_POST['password'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];

                        if (!empty($_FILES['image']['name'])) {
                            $image = $_FILES['image']['name'];
                            $tmp = $_FILES['image']['tmp_name'];
                            $folder = "../Admin/assets/uploads/" . $image;
                            move_uploaded_file($tmp, $folder);
                        }

                        $query = "UPDATE `users` SET name='$name', phone='$phone', address='$address', password='$password', image='$image' WHERE user_id='$user_id'";

                        if (mysqli_query($con, $query)) {
                            echo "<script>alert('Profile updated successfully');</script>";
                            echo "<script>window.location='profile.php';</script>";
                        } else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                    ?>

                </div>
            </div>

        </div>

        <div class="text-center mt-3 small text-muted">
            <p>Ensure all changes are saved before leaving the page.</p>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>