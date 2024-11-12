<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['id_user'])) {
    $id_user=$_GET['id_user'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:user_lihat.php");
?>