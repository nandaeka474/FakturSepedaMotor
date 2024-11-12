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
<h3> Faktur PT Yamaha </h3>

<form action="" method="post">
<table>
    <h4>FORM USER</h4>
    <tr>
        <td>Kode User</td>
        <td> <input type="text" name="id_user"> </td>
    </tr>
    <tr>
        <td> Nama User </td>
        <td> <input type="text" name="user"> </td>
    </tr>

        <td><a class="kembali" href="user_lihat.php">Kembali</a></td>
        <td><input type="submit" name="proses" value="Simpan User"></td>
    </tr>

</table>
</form>
</html>
<?php

if (isset($_POST['proses'])){
    include '../koneksi.php';
  
    $id_user = $_POST['id_user'];
    $user = $_POST['user'];
    
    mysqli_query($conn, "INSERT INTO user VALUES('$id_user','$user')");
    header("location:user_lihat.php");
}
?>