<!DOCTYPE html>
<html>
<head>
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
    
    input[type="text"] {
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
        background-color: #CF1B1B;
    }
    
    .edit,
    .hapus,
     {
        padding: 7.5px 10px;
        background-color: #CF1B1B;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
    }
    .kembali {
        
        padding: 10px 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        font-size: 14px;
    }
    
    .edit:hover,
    .hapus:hover,
    .kembali:hover {
        background-color: #CF1B1B;
    }
    
    .edit {
        margin-right: 5px;
    }
    
    .kembali {
        margin-top: 1px;
    }
    
    .kembali:hover {
        background-color: #CF1B1B;
        color: #333;
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
  
<form action="" method="post">
    <table>
        <h4>FORM FAKTUR TAMBAH</h4>
        <tr>
            <td> No. Faktur </td>
            <td> <input type="number" name="no_faktur" required> </td>
        </tr>
        <tr>
            <td> No. Seri </td>
            <td> <input type="number" name="no_seri" required> </td>
        </tr>
        <tr>
            <td> No. Rangka </td>
            <td>
                <select name="no_rangka" id="no_rangka" style="width:170px;" onchange="fetchPriceAndConvert()">
                    <option value="">--Pilih--</option>
                    <?php
                    include '../koneksi.php';
                    $query = mysqli_query($conn, "SELECT * FROM rangka");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $data['no_rangka']; ?>">
                        <?php echo $data['no_rangka']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Nama Pembeli </td>
            <td>
                <select name="id_pembeli" style="width:170px;" required>
                    <option value="">--Pilih--</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM pembeli");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $data['id_pembeli']; ?>">
                        <?php echo $data['nama_pembeli']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Nama User </td>
            <td>
                <select name="id_user" style="width:170px;" required>
                    <option value="">--Pilih--</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM user");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $data['id_user']; ?>">
                        <?php echo $data['user']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Unit </td>
            <td> <input type="text" name="unit" required> </td>
        </tr>
        <tr>
            <td> Terbilang </td>
            <td> <input type="text" name="terbilang" id="terbilang" readonly> </td>
        </tr>
        <tr>
            <td><a class="kembali" href="faktur_lihat.php">Kembali</a></td>
            <td><input type="submit" name="proses" value="Simpan Faktur"> </td>
        </tr>
    </table>
</form>

<script>
function fetchPriceAndConvert() {
    let noRangka = document.getElementById('no_rangka').value;
    if (noRangka) {
        fetch(`get_price.php?no_rangka=${noRangka}`)
            .then(response => response.text())
            .then(price => {
                document.getElementById('terbilang').value = numberToWords(price);
            });
    } else {
        document.getElementById('terbilang').value = '';
    }
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
<?php
if (isset($_POST['proses'])){
    include '../koneksi.php';
  
    $no_faktur = $_POST['no_faktur'];
    $no_seri = $_POST['no_seri'];
    $no_rangka = $_POST['no_rangka'];
    $id_pembeli = $_POST['id_pembeli'];
    $id_user = $_POST['id_user'];
    $unit = $_POST['unit'];
    $terbilang = $_POST['terbilang'];

    mysqli_query($conn, "INSERT INTO faktur VALUES('$no_faktur','$no_seri','$no_rangka','$id_pembeli','$id_user','$unit','$terbilang')");
    echo "<script>window.location.href = 'faktur_lihat.php?no_faktur=".$no_faktur."';</script>";
}
?>
