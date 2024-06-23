<?php
include 'class_db.php';
$db = new database();

$npm = $_GET['npm'];

$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$dat = $db->datasql($sql);

?>

<head>
    <title>Detail Mahasiswa</title>
</head>

<body>

    <?php include './menu.php'; ?>
    <h2>Tambah</h2>
    <form action="./mhs_proc.php" method="post">
        <label for="">NPM</label> <br>
        <input type="text" name="npm" placeholder="" value="<?= $dat['npm'] ?>"><br>
        <label for="">Nama</label> <br>
        <input type="text" name="nama" placeholder="" value="<?= $dat['nama'] ?>"><br>
        <label for="">Prodi</label> <br>
        <select name="prodi_id" id="">
            <?php
            $sql_pr = "SELECT * from prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $dat_pr) {
                if ($dat_pr['id'] == $dat['prodi_id'])
                    $selected = 'selected';
                else
                    $selected = '';
                echo "<option value='" . $dat_pr['id'] . "' $selected>" . $dat_pr['nama'] . "</option>";
            }
            ?>
        </select> <br>
        <label for="">Alamat</label> <br>
        <textarea name="alamat" id=""><?= $dat['alamat'] ?></textarea>
        <br><br>
        <input type="submit" value="UBAH" name="submit_ubah">
        <input type="submit" value="HAPUS" name="submit_hapus" onclick="return confirm('Yakin Mau Hapus Mahasiswa : (<?= $dat['nama'] ?>)')">
        <input type="hidden" name="npm_old" value="<?= $dat['npm'] ?>">
    </form>
</body>