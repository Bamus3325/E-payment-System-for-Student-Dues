<?php
$id = $_GET['id'];
include '_include/connect.php';
$query = mysqli_query( $con, "DELETE FROM users WHERE id = '$id'" );
if ($query == TRUE) {
    echo "<script>alert('User Deleted Successful ✔✔✔'); window.location='viewusers.php'; </script>";
}else {
    echo "<script>alert('User Not Deleted Successful'); </script>";

}
?>

