<?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "Select*from faktur where no_faktur = '$_GET[no_faktur]'");
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
<h3>Faktur PT Yamaha</h3>
<form action="" method="post">
<table>
    <h4>FORM UBAH Faktur</h4>
    <tr>
        <td> No. Faktur </td>
        <td> <input type="number" name="no_faktur" value="<?php echo $data['no_faktur'];?>" readonly> </td>
    </tr>

    <tr>
        <td> No. Seri </td>
        <td> <input type="number" name="no_seri" value="<?php echo $data['no_seri'];?>"> </td>
    </tr>

    <tr><td> 
        No. Rangka
        <td><select name="no_rangka" style="width:170px;">
        <?php
        include '../koneksi.php';
        $ambilrangka=mysqli_query($conn, "SELECT * FROM rangka");
        while ($rangka = mysqli_fetch_array($ambilrangka)) {
            $selected = ($data['no_rangka'] == $rangka['no_rangka']) ? 'selected' : '';
            echo "<option value='$rangka[no_rangka]' $selected>$rangka[no_rangka]</option>";
        }
        ?></td>
        </select>
        </td></tr>

    <tr><td> 
        Nama Pembeli
        <td><select name="id_pembeli" style="width:170px;">
        <?php
        include '../koneksi.php';
        $ambilpembeli=mysqli_query($conn, "SELECT * FROM pembeli");
        while ($pembeli = mysqli_fetch_array($ambilpembeli)) {
            $selected = ($data['id_pembeli'] == $pembeli['id_pembeli']) ? 'selected' : '';
            echo "<option value='$pembeli[id_pembeli]' $selected>$pembeli[nama_pembeli]</option>";
        }
        ?></td>
        </select>
        </td></tr>

        <tr><td> 
        Nama User
        <td><select name="id_user" style="width:170px;">
        <?php
        include '../koneksi.php';
        $ambiluser=mysqli_query($conn, "SELECT * FROM user");
        while ($user = mysqli_fetch_array($ambiluser)) {
            $selected = ($data['id_user'] == $user['id_user']) ? 'selected' : '';
            echo "<option value='$user[id_user]' $selected>$user[user]</option>";
        }
        ?></td>
        </select>
        </td></tr>

        <tr>
        <td> Unit </td>
        <td> <input type="text" name="unit" value="<?php echo $data['unit'];?>"> </td>
    </tr>

    <tr>
        <td> Terbilang </td>
        <td> <input type="text" name="terbilang" value="<?php echo $data['terbilang'];?>"> </td>
    </tr>


    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Ubah Faktur">|<a class="kembali" href="faktur_lihat.php">Kembali</a> </td>
    </tr>
    </table>
</form>

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
    
    
    mysqli_query($conn, "update faktur set no_seri='$no_seri', no_rangka ='$no_rangka', id_pembeli='$id_pembeli', id_user='$id_user',unit='$unit', terbilang='$terbilang' where no_faktur='$no_faktur'");
    header("location:faktur_lihat.php");
}