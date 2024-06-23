<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Nilai Angka: <input type="number" name="nilai" id="nilai" value="">
  <input type="submit" value="Konversi">
</form>

Nilai Huruf: <input type="text" id="nilaiHuruf" readonly>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil nilai dari form
    $nilai = $_POST['nilai'];

    // fungsi konversi nilai
    function konversiNilai($nilai) {
        if ($nilai >= 90) {
            return "A";
        } else if ($nilai >= 85) {
            return "A-";
        } else if ($nilai >= 80) {
            return "B+";
        } else if ($nilai >= 75) {
            return "B";
        } else if ($nilai >= 70) {
            return "B-";
        } else if ($nilai >= 65) {
            return "C+";
        } else if ($nilai >= 60) {
            return "C";
        } else if ($nilai >= 55) {
            return "C-";
        } else if ($nilai >= 50) {
            return "D";
        } else {
            return "E";
        }
    }

    // tampilkan hasil konversi
    echo "<script>document.getElementById('nilaiHuruf').value = '" . konversiNilai($nilai) . "';</script>";
}
?>

<script>
// simpan nilai inputan ke localStorage saat form disubmit
document.querySelector('form').addEventListener('submit', function() {
  localStorage.setItem('nilai', document.getElementById('nilai').value);
});

// ambil nilai inputan dari localStorage saat halaman dimuat
window.onload = function() {
  var nilai = localStorage.getItem('nilai');
  if (nilai !== null) document.getElementById('nilai').value = nilai;
};
</script>

</body>
</html>
