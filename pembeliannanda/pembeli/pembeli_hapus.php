<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['id_pembeli'])) {
    $id_pembeli=$_GET['id_pembeli'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM pembeli WHERE id_pembeli='$id_pembeli'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pembeli_lihat.php");
?>