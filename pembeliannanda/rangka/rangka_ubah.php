<?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "Select*from rangka where no_rangka = '$_GET[no_rangka]'");
            $data = mysqli_fetch_array($query);
            
                ?>
  
  <html>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 20px;
    }

    h3 {
        color: #333;
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    table {
        width: 100%;
    }

    h4 {
        text-align: center;
        background-color: #CF1B1B;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
    }

    tr {
        line-height: 2;
    }

    td:first-child {
        text-align: right;
        padding-right: 10px;
        color: #666;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
    }

    input[type="submit"] {
        padding: 8px 15px;
        background-color: #CF1B1B;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
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
</style>
<form action="" method="post">
<table>
    <h4>FORM UBAH RANGKA</h4>
    <tr>
        <td> NO.Rangka </td>
        <td> <input type="text" name="no_rangka" value="<?php echo $data['no_rangka'];?>" readonly> </td>
    </tr>

    <tr>
        <td> No Motor </td>
        <td> <input type="text" name="no_motor" value="<?php echo $data['no_motor'];?>"> </td>
    </tr>

            <tr>
        <td> Warna </td>
        <td> <input type="text" name="warna" value="<?php echo $data['warna'];?>"> </td>
    </tr>
    
    </tr>

            <tr>
        <td> Invoerpas No </td>
        <td> <input type="number" name="invoerpas_no" value="<?php echo $data['invoerpas_no'];?>"> </td>
    </tr>
    
    </tr>

            <tr>
        <td> Tahun </td>
        <td> <input type="number" name="tahun" value="<?php echo $data['tahun'];?>"> </td>
    </tr>

    </tr>

    <tr>
    <td> Harga </td>
    <td> 
        <input type="text" name="harga" value="<?php echo number_format($data['harga'], 0, ',', '.'); ?>" oninput="updateTerbilang()"> 
    </td>
</tr>

    </tr>

            <tr>
        <td> Model </td>
        <td> <input type="text" name="model" value="<?php echo $data['model'];?>"> </td>
    </tr>

    </tr>

            <tr>
        <td> Type </td>
        <td> <input type="text" name="type" value="<?php echo $data['type'];?>"> </td>
    </tr>

    </tr>

            <tr>
        <td> Merk </td>
        <td> <input type="text" name="merk" value="<?php echo $data['merk'];?>"> </td>
    </tr>
</tr>

            <tr>
        <td> Eks Kapal </td>
        <td> <input type="text" name="eks_kapal" value="<?php echo $data['eks_kapal'];?>"> </td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Ubah Rangka">|<a class="kembali" href="rangka_lihat.php">kembali</a> </td>
    </tr>
</form>
</table>

</html>

<?php

if (isset($_POST['proses'])){
    include '../koneksi.php';
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
    
    mysqli_query($conn, "update rangka set no_motor='$no_motor',warna='$warna',invoerpas_no='$invoerpas_no',tahun='$tahun',harga='$harga',model='$model',type='$type',merk='$merk',eks_kapal='$eks_kapal' where no_rangka='$no_rangka'");
    header("location:rangka_lihat.php");
}
?>