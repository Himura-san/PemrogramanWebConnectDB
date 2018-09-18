<?php
    require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TA 3 - View Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="data">
        <a href="index.php" id="button">Tambah Data</a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Fakultas</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
            </tr>
            <?php
                $no = 1;
                $query = $pdo -> prepare("SELECT * FROM tb_mahasiswa");
                $query -> execute();
                $baris = $query -> rowcount();
                while( $data = $query -> fetch(PDO::FETCH_ASSOC)){
            ?>
                    <tr>
                        <td width="3%"><?php echo $no;?></td>
                        <td width="8%"><?php echo $data['nim'];?></td>
                        <td width="20%"><?php echo $data['nama'];?></td>
                        <td width="8%"><?php echo $data['fakultas'];?></td>
                        <td width="8%"><?php echo $data['jenis_kelamin'];?></td>
                        <td><img src="<?php echo $data['foto'];?>"></td>
                    </tr>
            <?php
                    $no++;
                }
            ?>
        </table>
    </div> 
</body>
</html>