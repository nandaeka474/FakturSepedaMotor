<html>
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
    
    table td, table th {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center; /* Center align text horizontally */
        vertical-align: middle; /* Center align text vertically */
    }
    
    table th {
        background-color: #CF1B1B;
        color: #fff;
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
        background-color: #555;
    }
    
    .tambah,
    .edit {
        padding: 7.5px 10px;
        background-color: #CF1B1B;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
    }

    .hapus,
    .kembali {
        padding: 7.5px 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
    }

    .tambah:hover,
    .edit:hover,
    .hapus:hover,
    .kembali:hover {
        background-color: #555;
    }
    
    .edit {
        margin-right: 5px;
    }
    
    .tambah,
    .kembali {
        margin-top: 1px;
    }
    
    .tambah:hover,
    .kembali:hover {
        background-color: #f2f2f2;
        color: #333;
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        font-size: 14px;
        margin-right: 5px;
    }

    .pagination a.current {
        background-color: #CF1B1B;
    }
    
    h4 {
        text-align: center;
        background-color: #CF1B1B;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
    }
</style>
<h3> Faktur PT Yamaha </h3>
<form>

<h4>TABEL USER</h4>
<a class="tambah" href="user_tambah.php">Tambah</a>|<a class="kembali" href="../home.php">Kembali</a>
<table border="1" align="center" width="100%">
    <tr bgcolor="green">
    <th>Kode User</th>
    <th>Nama User</th>
    <th>Aksi</th>
    </tr>
    <tr>
        <?php
            include '../koneksi.php';
            $limit = 10; // Jumlah baris per halaman
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;
        
            $query = mysqli_query($conn, "SELECT * FROM user LIMIT $start, $limit");
            while ($data=mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $data['id_user']   ;?></td>
                <td><?php echo $data['user'] ;?></td>
                <td>
				<a class="edit" href="user_ubah.php?id_user=<?php echo $data['id_user'];?>" >Edit</a> |
				<a class="hapus" href="user_hapus.php?id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('yakin hapus?')">Hapus</a>				
			</td>
            </tr>
            </tr>
            <?php } ?>

</table>

        <div class="pagination">
            <?php
            $query_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM user");
            $data_total = mysqli_fetch_assoc($query_total);
            $total_pages = ceil($data_total['total'] / $limit);

            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '">Back</a>';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo '<a href="?page=' . $i . '" class="current">' . $i . '</a>';
                } else {
                    echo '<a href="?page=' . $i . '">' . $i . '</a>';
                }
            }

            if ($page < $total_pages) {
                echo '<a href="?page=' . ($page + 1) . '">Next</a>';
            }
            ?>
</div>
</form>
</html>
