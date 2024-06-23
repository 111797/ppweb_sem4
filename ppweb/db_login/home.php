<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Selamat Datang</h1>
    <?php
    include 'cek_login.php';
    include 'class_db.php';

    $db = new database();
    $sql = "SELECT MHS.nama as mahasiswa_nama, PR.nama as prodi_nama
            FROM mahasiswa MHS 
            JOIN prodi PR ON MHS.prodi_id = PR.id 
            ORDER BY MHS.nama";

    $data = $db->fetchdata($sql);
    $i = 0;
    foreach ($data as $dat) {
        $i++;
        echo '<br>' . $i . '. ' . $dat['mahasiswa_nama'] . ' | ' . $dat['prodi_nama'];
    }
    ?>
    <br><br><a href="logout.php">Logout</a>
</body>

</html>