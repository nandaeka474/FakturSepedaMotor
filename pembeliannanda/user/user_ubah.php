<?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "Select*from user where id_user = '$_GET[id_user]'");
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
    <h4>FORM UBAH USER</h4>
    <tr>
        <td> Kode User </td>
        <td> <input type="text" name="id_user" value="<?php echo $data['id_user'];?>" readonly> </td>
    </tr>

    <tr>
        <td> User </td>
        <td> <input type="text" name="user" value="<?php echo $data['user'];?>"> </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Ubah User">|<a class="kembali" href="user_lihat.php">kembali</a> </td>
    </tr>
         
</form>
</table>

</html>

<?php

if (isset($_POST['proses'])){
    include '../koneksi.php';
    $id_user = $_POST ['id_user'];
    $user = $_POST['user'];

    
    mysqli_query($conn, "update user set user='$user' where id_user='$id_user'");
    header("location:user_lihat.php");
}
?>