


<!DOCTYPE html>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    text-align: center;
}

.transaction-details {
    margin-bottom: 20px;
}

.medicine-list table {
    width: 100%;
    border-collapse: collapse;
}

.medicine-list th, .medicine-list td {
    padding: 8px;
    border: 1px solid #ccc;
    text-align: center;
}

.total-amount {
    text-align: right;
    margin-top: 20px;
}

.ttd {
  display: flex;
  align-items: center;
  margin-bottom: 50px;
}

.ttd1 {
  display: flex;
  align-items: center;
}

p {
    margin: 0;
}

strong {
    font-weight: bold;
}

.teks-sejajar {
  display: flex;
  align-items: center;
}
.kanan {
  margin-left: auto;
}
.kanann {
  margin-left: 150px;
}
.kanan2 {
  margin-left: 80px;
}

</style>
<html>
<head>
    <title>Klinik Melyan</title>
    
</head>
<body>
    <div class="container">
        <div class="transaction-details">
            <p><strong>PT YAMAHA INDONESIA MOTOR MFC</strong> </p>
            <div class="teks-sejajar">
                <p>_________________________________</p>
                <p class="kanan"><strong>Nota Biaya Periksa / Obat / Tindakan</strong></p>
            </div>
            <div class="teks-sejajar">
            <p>Jl. Jambu No.21 Depok</p>
            
            <p class="kanan">
            <?php
                include '../koneksi.php';
                $query=mysqli_query($conn, "Select*from faktur where no_faktur = '$_GET[no_faktur]'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    
                    <?php echo $data['no_faktur'];?>
                <?php
                }
                ?>
            </p>
            </div>
            <p>776655</p>
            <p>================================================================</p>
        </div>
                
        <div class="transaction-details">
        <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from faktur f ,rangka r, pembeli p, user u where f.no_rangka=r.no_rangka AND f.id_pembeli=p.id_pembeli AND f.id_user=u.id_user AND no_faktur = '$_GET[no_faktur]'");
            $data = mysqli_fetch_array($query);
            
                ?>
        <div class="teks-sejajar">
            <p>Pasien   :</p>
            <?php echo $data['namapasien']; ?>
            <p class="kanan">Jenis Kelamin  :</p>
            <?php echo $data['jenkelpasien']; ?>
        </div>
        <div class="teks-sejajar">
            <p>Alamat   :</p>
            <?php echo $data['alamatpasien']; ?>
            <p class="kanan">Umur   :</p>
            <?php echo $data['umurpasien']; ?>
        </div>
        <div class="teks-sejajar">
            <p>Penanggung   :</p>
            <?php echo $data['penanggung']; ?>
            <p class="kanan">Tanggal    :</p>
            <?php echo $data['tglnota']; ?>
        </div>
        </div>

        <div class="medicine-list">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>Tarif Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
    <?php
            include '../koneksi.php';
            $index = 1;
            $kodenota = $_GET['kodenota'];
            $query = mysqli_query($conn, "SELECT O.namaobat, O.tarifsatuan, DN.qty, DN.subtotal, N.kodenota
            FROM Nota N
            JOIN DetailNota DN ON N.kodenota = DN.kodenota
            JOIN Obat O ON DN.kodeobat = O.kodeobat
            WHERE N.kodenota = '$kodenota'");
            $totalharga = 0; // Inisialisasi grand total

            
            while ($data = mysqli_fetch_array($query)) {
                $subtotal = $data['tarifsatuan'] * $data['qty'];
                $totalharga += $subtotal;
                ?>
                <tr>
                <td><?php echo htmlspecialchars ($index++); ?></td>
                <td><?php echo $data['namaobat']   ;?></td>
                <td><?php echo $data['tarifsatuan']    ;?></td>
                <td><?php echo $data['qty'] ;?></td>
                <td><?php echo $subtotal ;?></td>
             
            </tr>
            
            <?php }
             ?>
   
            </table>
        </div>

        <div class="total-amount">
        <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from nota where kodenota = '$_GET[kodenota]'");
            $data = mysqli_fetch_array($query);
            
                ?>
            <p><strong>Total: <?php echo "Rp.". $totalharga; ?></strong></p>
            
        </div>

        <div class="ttd">
    <p><strong>Pasien</strong></p>
    <p class="kanann"><strong>Dokter</strong></p>
    </div>
        
    <div class="ttd1">
    <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from nota n ,pasien p, dokter d where n.kodepasien=p.kodepasien AND n.kodedokter=d.kodedokter AND kodenota = '$_GET[kodenota]'");
            $data = mysqli_fetch_array($query);
                ?>
                <?php echo $data['namapasien']; ?>
    <p class="kanann"><?php echo $data['namadokter']; ?></p>
    </div>

    <div class="ttd1">
    <p><strong>_____________</strong></p>
    <p class="kanan2"><strong>_____________</strong></p>
    <a class="kanan" href="nota.php">Kembali</a>
    </div>

    </div>
    <script>
    window.onload = function() {
      window.print();
    }
  </script>
</body>
</html>
