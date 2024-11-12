<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['no_rangka'])) {
    $no_rangka=$_GET['no_rangka'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM rangka WHERE no_rangka='$no_rangka'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:rangka_lihat.php");
?>