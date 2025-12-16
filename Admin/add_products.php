<?php
include('header.php');
include('config.php');
?>

<div class="main-content">
    <section class="section">

        <div class="row">

            <!-- ================= PRODUCTS TABLE ================= -->
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h4>Products</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <?php
                                $query = "SELECT * FROM products ";
                                $result = mysqli_query($con, $query);
                                $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                ?>

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($items as $row): ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><img src="assets/uploads/<?= $row['image'] ?>" width="50" class="rounded">
                                            </td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['price']; ?></td>
                                            <td><?= $row['category']; ?></td>
                                            <td><?= $row['description']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['stock'] > 5) {
                                                    echo '<div class="badge badge-success">' . $row['stock'] . '</div>';
                                                } else {
                                                    echo '<div class="badge badge-warning">' . $row['stock'] . '</div>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <div class="m-2"></div>
                                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-warning">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>


            <!-- ================= ADD PRODUCT CARD ================= -->
            <div class="col-md-4">
                <div class="card card-hero">

                    <div class="card-header">
                        <div class="card-description">Add New Product</div>
                    </div>

                    <div class="card-body p-3">

                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="Enter product name" name="proname">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" placeholder="Enter price" name="proprice">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="procategory">
                                    <option hidden> Select Category</option>
                                    <option>Cosmetics</option>
                                    <option>Jewellery</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="Enter Description" name="prodesc">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" class="form-control" placeholder="Enter stock" name="prostock">
                            </div>

                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" class="form-control" name="proimage">
                            </div>

                            <button class="btn btn-primary btn-block" type="submit" name="addproduct">Add
                                Product</button>

                        </form>
                        <?php
                        include "config.php";

                        if (isset($_POST['addproduct'])) {

                            $name = $_POST['proname'];
                            $price = $_POST['proprice'];
                            $category = $_POST['procategory'];
                            $description = $_POST['prodesc'];
                            $stock = $_POST['prostock'];
                            $image = $_FILES['proimage']['name'];
                            $tmp = $_FILES['proimage']['tmp_name'];
                            $folder = "assets/uploads/" . $image;
                            move_uploaded_file($tmp, $folder);

                            $query = "INSERT INTO products (name, price, category, image, description, stock) 
                          VALUES ('$name', '$price', '$category', '$image', '$description', '$stock')";

                            if (mysqli_query($con, $query)) {
                                echo "<script>alert('Product Added Successfully');</script>";
                                echo "<script>window.location='add_products.php';</script>";
                            } else {
                                echo "Error: " . mysqli_error($con);
                            }
                        }
                        ?>

                    </div>

                </div>
            </div>

        </div>
    </section>
</div>


