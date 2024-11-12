


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
        display: flex;
        margin-left:50px;
    }
    .kanann {
    margin-left: 150px;
    margin-left: auto;
    }
    .kanan2 {
    margin-left: 80px;
    }
    .kanan3 {
    margin-left: 250px;
    }

</style>
<html>
<head>
    <title>FAKTUR CETAK</title>
    
</head>
<body>
    <div class="container">
        <div class="transaction-details">
        <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from faktur f ,rangka r, pembeli p, user u where f.no_rangka=r.no_rangka AND f.id_pembeli=p.id_pembeli AND f.id_user=u.id_user AND no_faktur = '$_GET[no_faktur]'");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="flexbox"
            style="display:flex;">
                <div class="text-sejajar">
                    <h1 style="font-size:22px;">PT Yamaha Motor INDONESIA</h1>
                </div>
                <div class="tengah" style="margin-left:20px; margin-top:20px;">
                <p>User:  <?php echo $data['user']; ?> </p>
                </div>
                <div class="kanan">
                    <img src="../images/logo yamaha.png" alt="logo yamaha" srcset="" style="width:120px; margin-bottom:5px;">
                </div>
            </div>

            <div class="teks-sejajar">
            <p><strong>FAKTUR</strong></p>
            
            <p class="kanan">
            <?php
                include '../koneksi.php';
                $query=mysqli_query($conn, "Select*from faktur where no_faktur = '$_GET[no_faktur]'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <p style="font-weight:bold; margin-left:348px;">No: </span> <span style="margin-left:5px;"> </span>  </p>
                    <?php echo $data['no_faktur'];?>
                <?php
                }
                ?>
            </p>
            </div>
            <p>____________________________________________________________________</p>
        </div>  
                
        <div class="transaction-details">
        <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from faktur f ,rangka r, pembeli p, user u where f.no_rangka=r.no_rangka AND f.id_pembeli=p.id_pembeli AND f.id_user=u.id_user AND no_faktur = '$_GET[no_faktur]'");
            $data = mysqli_fetch_array($query);
            
                ?>
       
        <div class="teks-sejajar">
            <p style="margin-right:49px;" >Kepada  :</p>
            <?php echo $data['nama_pembeli']; ?>
            </div>
        <div class="teks-sejajar">
            <p style="margin-right:112px;"></p>
            <?php echo $data['alamat']; ?>
        </div>
        <div class="teks-sejajar">
            <p style="margin-right:112px;" ></p>
            <?php echo $data['kota']; ?>
        </div>

        <div class="medicine-list">
            <table style="margin-top:20px;">
                <tr>
                    
                    <th style = "text-align:left;">SEPEDA MOTOR MERK <?php echo $data['merk'] ;?> </th>
                    <th>Unit</th>
                    <th>Harga</th>
                </tr>
                <tr>
    <?php
            include '../koneksi.php';
            $no_faktur = $_GET['no_faktur'];
            $query = mysqli_query($conn, "SELECT r.merk, f.unit, r.harga
            FROM faktur f
            JOIN rangka r ON f.no_rangka = r.no_rangka
            WHERE f.no_faktur = '$no_faktur'");
             

            while ($data = mysqli_fetch_array($query)) {
                ?>
               <tr>
               <td style = "text-align:left;" > - Keadaan 100% baru lengkap dengan perkakasnya <br style = "text-align:left;" > - Negeri asal <span style="font-weight:bolder;">Jepang </span></td>
                <td><?php echo $data['unit'] ;?></td>
                <td><?php echo $data['harga'] ;?></td>
                </tr>

            
            <?php }
             ?>
   
            </table>
        </div>
        <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * from faktur f ,rangka r, pembeli p, user u where f.no_rangka=r.no_rangka AND f.id_pembeli=p.id_pembeli AND f.id_user=u.id_user AND no_faktur = '$_GET[no_faktur]'");
            $data = mysqli_fetch_array($query);
            
                ?>
            <div style="margin-top:20px" class="teks-sejajar">
            <p >Model  <span style="margin-left:80px;">: </span> <span style="margin-left:5px;"> </span></p>
            <?php echo $data['model']; ?>
            <p class="kanan" style="margin-left:100px;">Tahun <span style="margin-left:50px;">: </span></span> <span style="margin-right:6px;"> </p>
            <?php echo $data['tahun']; ?>
            </div>

            <div class="teks-sejajar">
            <p>Nomor Rangka <span style="margin-left:16px;">:</span> <span style="margin-left:3px;"></span></p>
            <?php echo $data['no_rangka']; ?>
            </div>
            <div class="teks-sejajar">
            <p>Type <span style="margin-left:89px;">:</span> <span style="margin-left:3px;"></span></p>
            <?php echo $data['type']; ?>
            </div>

            <div class="teks-sejajar">
            <p>Nomor Motor <span style="margin-left:30px;">:</span> <span style="margin-left:4px;"></span></p>
            <?php echo $data['no_motor']; ?>
            </div>
            <div class="teks-sejajar">
            <p>Warna <span style="margin-left:77px;">:</span> <span style="margin-left:3px;"></span></p>
            <?php echo $data['warna']; ?>
            </div>

            <div class="teks-sejajar">
            <p>Eks Kapal <span style="margin-left:51px;">: </span><span style="margin-left:4px;"></span></p>
            <?php echo $data['eks_kapal']; ?>
            </div>
            <div class="teks-sejajar">
            <p>Invoerpas No <span style="margin-left:28px;">:</span> <span style="margin-left:3px;"></span></p>
            <?php echo $data['invoerpas_no']; ?>
            </div>

            <div class="teks-sejajar">
            <p style="margin-top:10px; margin-bottom:10px;">Faktur ini berlaku untuk pendaftaran nomor Polisi diseluruh  <span style="font-weight:bolder;">INDONESIA</span></p>
            </div>

            <div class="teks-sejajar">
            <p>=================================================================</p>
            </div>

            <div class="teks-sejajar">
            <p>Terbilang : <span style="font-size:bold;"> <?php echo $data['terbilang']; ?> </span></p>
            </div>

            <div class="teks-sejajar">
            <p>=================================================================</p>
            </div>

  
    <script>
    window.onload = function() {
      window.print();
    }
  </script>
</body>
</html>
