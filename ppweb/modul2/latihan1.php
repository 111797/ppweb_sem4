<?php

class Balok {
  private $panjang;
  private $lebar;
  private $tinggi;

  public function __construct($panjang, $lebar, $tinggi) {
    $this->panjang = $panjang;
    $this->lebar = $lebar;
    $this->tinggi = $tinggi;
  }

  public function hitungLuas() {
    $luasPermukaan = 2 * ($this->panjang * $this->lebar + $this->panjang * $this->tinggi + $this->lebar * $this->tinggi);
    return $luasPermukaan;
  }

  public function hitungVolume() {
    $volume = $this->panjang * $this->lebar * $this->tinggi;
    return $volume;
  }
}

// Form HTML untuk input data balok
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hitung Luas dan Volume Balok</title>
</head>
<body>
  <h1>Hitung Luas dan Volume Balok</h1>
  <form action="" method="post">
    <label for="panjang">Panjang:</label>
    <input type="number" id="panjang" name="panjang" required>
    <br>
    <label for="lebar">Lebar:</label>
    <input type="number" id="lebar" name="lebar" required>
    <br>
    <label for="tinggi">Tinggi:</label>
    <input type="number" id="tinggi" name="tinggi" required>
    <br>
    <br>
    <button type="submit">Hitung</button>
  </form>

  <br>

HTML;

// Memproses data input dan menghitung luas dan volume balok
if (isset($_POST['panjang']) && isset($_POST['lebar']) && isset($_POST['tinggi'])) {
  $panjang = $_POST['panjang'];
  $lebar = $_POST['lebar'];
  $tinggi = $_POST['tinggi'];

  $balok = new Balok($panjang, $lebar, $tinggi);
  $luas = $balok->hitungLuas();
  $volume = $balok->hitungVolume();

  echo <<<RESULT
    <h2>Hasil Perhitungan</h2>
    <p>Panjang: $panjang</p>
    <p>Lebar: $lebar</p>
    <p>Tinggi: $tinggi</p>
    <br>
    <p>Luas Permukaan: $luas</p>
    <p>Volume: $volume</p>
RESULT;
}

echo <<<HTML
</body>
</html>
HTML;
