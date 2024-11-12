<?php
include '../koneksi.php'; // Pastikan file koneksi.php ada dan terhubung dengan database

if (isset($_POST['proses'])) {
    $no_rangka = $_POST['no_rangka'];
    $no_motor = $_POST['no_motor'];
    $warna = $_POST['warna'];
    $invoerpas_no = $_POST['invoerpas_no'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $merk = $_POST['merk'];
    $eks_kapal = $_POST['eks_kapal'];

    // Masukkan data ke dalam database
    $query = "INSERT INTO rangka (no_rangka, no_motor, warna, invoerpas_no, tahun, harga, model, type, merk, eks_kapal) 
              VALUES ('$no_rangka','$no_motor','$warna', '$invoerpas_no', '$tahun', '$harga', '$model', '$type', '$merk', '$eks_kapal')";

    if (mysqli_query($conn, $query)) {
        header("Location: rangka_lihat.php");
        exit(); // Pastikan untuk menghentikan eksekusi script setelah header
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Faktur PT Yamaha</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    h3 {
        color: #333;
        text-align: center;
        margin-top: 20px;
    }
    form {
        margin: 20px auto;
        width: 80%;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table td {
        padding: 10px;
        border: 1px solid #ccc;
    }
    table th {
        padding: 10px;
        background-color: #CF1B1B;
        color: #fff;
        border: 1px solid #ccc;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    input[type="text"], input[type="number"] {
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
    }
    input[type="submit"] {
        padding: 8px 20px;
        background-color: #CF1B1B;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #b71c1c;
    }
    .kembali {
        padding: 10px 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        font-size: 14px;
    }
    .kembali:hover {
        background-color: #555;
    }
    h4 {
        text-align: center;
        background-color: #CF1B1B;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<h3> Faktur PT Yamaha </h3>
<form action="" method="post">
<table>
    <h4>FORM RANGKA</h4>
    <tr>
        <td>No. Rangka</td>
        <td> <input type="text" name="no_rangka" required> </td>
    </tr>
    <tr>
        <td>No. Motor</td>
        <td> <input type="text" name="no_motor" required> </td>
    </tr>
    <tr>
        <td>Warna</td>
        <td> <input type="text" name="warna" required> </td>
    </tr>
    <tr>
        <td>Invoerpas No</td>
        <td> <input type="number" name="invoerpas_no" required> </td>
    </tr>
    <tr>
        <td>Tahun</td>
        <td> <input type="number" name="tahun" required> </td>
    </tr>
    <tr>
        <td>Harga</td>
        <td> <input type="number" name="harga" required> </td>
    </tr>
    <tr>
        <td>Model</td>
        <td> <input type="text" name="model" required> </td>
    </tr>
    <tr>
        <td>Type</td>
        <td> <input type="text" name="type" required> </td>
    </tr>
    <tr>
        <td>Merk</td>
        <td> <input type="text" name="merk" required> </td>
    </tr>
    <tr>
        <td>Eks Kapal</td>
        <td> <input type="text" name="eks_kapal" required> </td>
    </tr>
    <tr>
        <td><a class="kembali" href="rangka_lihat.php">Kembali</a></td>
        <td><input type="submit" name="proses" value="Simpan Rangka"></td>
    </tr>
</table>
</form>
<script>
function convertToTerbilang() {
    let harga = document.getElementById('harga').value;
    let terbilang = numberToWords(harga);
    localStorage.setItem('terbilang', terbilang);
}

function numberToWords(number) {
    const satuan = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    let words = "";

    number = parseInt(number);

    if (number < 12) {
        words = satuan[number];
    } else if (number < 20) {
        words = numberToWords(number - 10) + " Belas";
    } else if (number < 100) {
        words = numberToWords(Math.floor(number / 10)) + " Puluh " + numberToWords(number % 10);
    } else if (number < 200) {
        words = "seratus " + numberToWords(number - 100);
    } else if (number < 1000) {
        words = numberToWords(Math.floor(number / 100)) + " Ratus " + numberToWords(number % 100);
    } else if (number < 2000) {
        words = "seribu " + numberToWords(number - 1000);
    } else if (number < 1000000) {
        words = numberToWords(Math.floor(number / 1000)) + " Ribu " + numberToWords(number % 1000);
    } else if (number < 1000000000) {
        words = numberToWords(Math.floor(number / 1000000)) + " Juta " + numberToWords(number % 1000000);
    }

    return words.trim();
}
</script>

</body>
</html>
