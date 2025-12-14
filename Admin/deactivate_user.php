<?php
include('config.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "UPDATE users SET status=0 WHERE user_id='$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Use a single script block for alert + redirect
        echo "<script>
                window.location.href='clints.php';
              </script>";
        exit(); // Stop further PHP execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

} else {
    echo "User ID missing";
}

mysqli_close($con);
?>