<!DOCTYPE html>
<html>
<head>
    <title>Data Pengunjung Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
         <h1>Data Pengunjung</h1>
         <h2>Perpustakaan</h2>
    </div>
    <br>

    <a href="index.php">Lihat Semua Data</a>

    <br>

    <h2><p style="text-align:center"> Edit Data </p></h2>
    <?php
    include "koneksi.php";
    $id = $_GET["id"];
    $query_mysql = mysqli_query($koneksi,"select * from user where id = '$id'");
    $nomor = 1;
    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
    <form action="update.php" method="POST">
        <Table>
        <table style="margin-left:auto;margin-right:auto" border="1">
    <thead>
            <tr>
                <td>Nama</td>
                <td><input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <input type="text" name="nama" value="<?php echo $data['nama'] ?>">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>">
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan'] ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="Simpan">
                </td>
            </tr>
        </Table>
    </form>
    <?php } ?>
</body>
</html>