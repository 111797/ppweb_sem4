<?php

class NilaiMataKuliah {
  private $nilaiAngka;

  public function __construct($nilaiAngka) {
    $this->nilaiAngka = $nilaiAngka;
  }

  public function konversiNilaiHuruf() {
    if ($this->nilaiAngka >= 0 && $this->nilaiAngka <= 40) {
      $nilaiHuruf = 'E';
    } else if ($this->nilaiAngka >= 41 && $this->nilaiAngka <= 55) {
      $nilaiHuruf = 'D';
    } else if ($this->nilaiAngka >= 56 && $this->nilaiAngka <= 65) {
      $nilaiHuruf = 'C';
    } else if ($this->nilaiAngka >= 66 && $this->nilaiAngka <= 75) {
      $nilaiHuruf = 'B';
    } else if ($this->nilaiAngka >= 76 && $this->nilaiAngka <= 100) {
      $nilaiHuruf = 'A';
    } else {
      $nilaiHuruf = 'Nilai tidak valid';
    }

    return $nilaiHuruf;
  }
}

// Form HTML untuk input nilai mata kuliah
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konversi Nilai Mata Kuliah</title>
</head>
<body>
  <h1>Konversi Nilai Mata Kuliah</h1>
  <form action="" method="post">
    <label for="nilaiAngka">Nilai Angka:</label>
    <input type="number" id="nilaiAngka" name="nilaiAngka" required>
    <br>
    <br>
    <button type="submit">Konversi</button>
  </form>

  <br>

HTML;

// Memproses data input dan mengkonversi nilai angka ke nilai huruf
if (isset($_POST['nilaiAngka'])) {
  $nilaiAngka = $_POST['nilaiAngka'];

  $nilaiMataKuliah = new NilaiMataKuliah($nilaiAngka);
  $nilaiHuruf = $nilaiMataKuliah->konversiNilaiHuruf();

  echo <<<RESULT
    <h2>Hasil Konversi</h2>
    <p>Nilai Angka: $nilaiAngka</p>
    <p>Nilai Huruf: $nilaiHuruf</p>
RESULT;
}

echo <<<HTML
</body>
</html>
HTML;
