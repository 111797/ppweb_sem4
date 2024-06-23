<?php
// CREATE
function tambahMahasiswa($conn, $nama, $nim, $jurusan) {
    $sql = "INSERT INTO mahasiswa (nim, nama, jk) VALUES ('$nim', '$nama', '$jk')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// READ
function ambilMahasiswa($conn) {
    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);
    $mahasiswa = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $mahasiswa[] = $row;
        }
    }
    return $mahasiswa;
}

// UPDATE
function updateMahasiswa($conn, $id, $nama, $nim, $jurusan) {
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jk' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// DELETE
function hapusMahasiswa($conn, $id) {
    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
