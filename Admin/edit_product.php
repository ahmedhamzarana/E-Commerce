<?php include('header.php'); include('config.php');?>
<div class="main-content">
<section class="section">
<div class="row justify-content-center">
<div class="col-md-6">

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="card card-hero">

<div class="card-header">
    <div class="card-description">Edit Product</div>
</div>

<div class="card-body p-3">

<form method="POST" enctype="multipart/form-data">

<!-- Product Name -->
<div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" name="proeditname" value="<?php echo $row['name']; ?>" required>
</div>

<!-- Price -->
<div class="form-group">
    <label>Price</label>
    <input type="number" class="form-control" name="proeditprice" value="<?php echo $row['price']; ?>" required>
</div>

<!-- Category -->
<div class="form-group">
    <label>Category</label>
    <select class="form-control" name="proeditcategory" required>
        <option value="">Select Category</option>
        <option <?php if($row['category']=="Cosmetics") echo "selected"; ?>>Cosmetics</option>
        <option <?php if($row['category']=="Jewellery") echo "selected"; ?>>Jewellery</option>
    </select>
</div>

<!-- Description -->
<div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name="proeditdesc" value="<?php echo $row['description']; ?>" required>
</div>

<!-- Stock -->
<div class="form-group">
    <label>Stock</label>
    <input type="number" class="form-control" name="proeditstock" value="<?php echo $row['stock']; ?>" required>
</div>

<!-- Image -->
<div class="form-group">
    <label>Product Image</label>
    <input type="file" class="form-control" name="proeditimage">
    <br>
    <img src="assets/uploads/<?php echo $row['image']; ?>" width="150">
</div>

<button class="btn btn-primary btn-block" type="submit" name="Editproduct">
Update Product
</button>

</form>

<?php
if(isset($_POST['Editproduct'])){

    $name = $_POST['proeditname'];
    $price = $_POST['proeditprice'];
    $category = $_POST['proeditcategory'];
    $description = $_POST['proeditdesc'];
    $stock = $_POST['proeditstock'];

    if(!empty($_FILES['proeditimage']['name'])){
        $image = $_FILES['proeditimage']['name'];
        $tmp = $_FILES['proeditimage']['tmp_name'];
        move_uploaded_file($tmp, "assets/uploads/".$image);
    } else {
        $image = $row['image']; // purani image preserve
    }

    $update = "UPDATE products SET 
                name='$name', 
                price='$price', 
                category='$category',
                image='$image',
                description='$description',
                stock='$stock' 
                WHERE id='$id'";

    if(mysqli_query($con, $update)){
        echo "<script>alert('Product Updated Successfully');</script>";
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

<?php include('footer.php'); ?>
