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
    <h2><p style="text-align:center"> Input Data Baru </p></h2>
    <form action="Input-aksi.php" method="POST">
        <table>
        <table style="margin-left:auto;margin-right:auto" border="1">
    <thead>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="Alamat"></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="Pekerjaan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>

    </form>

</body>
</html>