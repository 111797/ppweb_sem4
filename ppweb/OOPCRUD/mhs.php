<?php
include './class_db.php';
$db = new database;

if (isset($_POST['cari'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
} else {
    $npm = '';
    $nama = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>

<body>
    <h2>Data Mahasiswa</h2>
    <form action="" method="post">
        <input type="text" name="npm" value="<?= $npm ?>" placeholder="NPM">
        <input type="text" name="nama" value="<?= $nama ?>" placeholder="Nama">
        <input type="submit" name="cari" value="Cari">
    </form>

    <?php
    include './menu.php';
    ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>#</td>
                <td>No</td>
                <td>NPM</td>
                <td>Nama</td>
                <td>Prodi</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT MHS.*, PR.nama as pr_nama
            FROM mahasiswa MHS
            JOIN prodi PR ON MHS.prodi_id=PR.id
            WHERE MHS.npm LIKE '%$npm%'
            AND MHS.nama LIKE '%$nama%'
            ORDER BY MHS.nama";
            $data = $db->fetchdata($sql);
            $i = 0;
            foreach ($data as $dat) {
                $i++;
                echo "<tr>
                        <td><a href='mhs_detil.php?npm=" . $dat['npm'] . "'>Detil</a></td>
                        <td>$i</td>
                        <td>" . $dat['npm'] . "</td>
                        <td>" . $dat['nama'] . "</td>
                        <td>" . $dat['pr_nama'] . "</td>
                        </tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>