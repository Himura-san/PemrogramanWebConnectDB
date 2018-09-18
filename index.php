<?php
    require("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TA 3 - Input Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="data.php" id="button">View Data</a>
<!-- =============================================================================== -->
        <div class="form">
            <div id="title">
                <h3>Input Data</h3>
            </div>
            <div id="data">
                <form method="POST" enctype="multipart/form-data">
                    <b>NIM</b> <br><input type="text" name="nim" required><br><br>
                    
                    <b>Nama</b> <br><input type="text" name="nama" required><br><br>
                    
                    <b>Fakultas</b> <br>
                    <select name="fakultas" id="dropdown" required>
                        <option value="FTE">FTE</option>
                        <option value="FRI">FRI</option>
                        <option value="FIF">FIF</option>
                        <option value="FEB">FEB</option>
                        <option value="FKB">FKB</option>
                        <option value="FIK">FIK</option>
                        <option value="FIT">FIT</option>
                    </select>
                    <br><br>
                    
                    <b>Jenis Kelamin : </b>
                    <input type="radio" name="jk" value="Laki-laki" required> Laki-Laki
                    <input type="radio" name="jk" value="Perempuan" required> Perempuan <br><br>
                    
                    <b>Foto : </b><input type="file" name="foto" required><br><br>
                    
                    <input type="submit" value="Simpan"> <input type="reset" value="Reset">
                </form>
            </div>
        </div>
<!-- =============================================================================== -->
    </body>
</html>
<?php
    if (isset($_POST['nim'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $jk = $_POST['jk'];

        $nama_foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $dir_foto = "photos/";
        $target_foto = $dir_foto . $nama_foto;

        if (!move_uploaded_file($tmp_foto, $target_foto))
            die("Foto gagal di upload..!!");

        $query = $pdo -> prepare("INSERT INTO tb_mahasiswa VALUES ('$nim','$nama','$fakultas','$jk','$target_foto')");
        $query -> execute();

        if ($query)
            header("Location: data.php");
        else
            echo "Tambah data Gagal..";
    }
?>
