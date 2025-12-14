<?php
include('config.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "UPDATE users SET status=1 WHERE user_id='$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                window.location.href='clints.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

} else {
    echo "User ID missing";
}

mysqli_close($con);
?>