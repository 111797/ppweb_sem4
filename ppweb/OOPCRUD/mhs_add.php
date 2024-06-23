<?php
include './class_db.php';
$db = new database();
?>

<head>
    <title>Tambah</title>
</head>

<body>

    <?php include './menu.php'; ?>
    <h2>Tambah</h2>
    <form action="./mhs_proc.php" method="post">
        <label for="">NPM</label> <br>
        <input type="text" name="npm" placeholder=""><br>
        <label for="">Nama</label> <br>
        <input type="text" name="nama" placeholder=""><br>
        <label for="">Prodi</label> <br>
        <select name="prodi_id" id="">
            <?php
            $sql_pr = "SELECT * from prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $dat_pr) {
                echo "<option value='" . $dat_pr['id'] . "'>" . $dat_pr['nama'] . "</option>";
            }
            ?>
        </select> <br>
        <label for="">Alamat</label> <br>
        <textarea name="alamat" id=""></textarea>
        <br><br>
        <input type="submit" value="SIMPAN" name="submit_tambah">
    </form>
</body>