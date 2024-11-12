<?php
include '../koneksi.php';

if (isset($_GET['no_rangka'])) {
    $no_rangka = $_GET['no_rangka'];
    $query = mysqli_query($conn, "SELECT harga FROM rangka WHERE no_rangka = '$no_rangka'");
    if ($row = mysqli_fetch_assoc($query)) {
        echo $row['harga'];
    } else {
        echo '0';
    }
}
?>
