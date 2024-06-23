<?php

class Bola {
  private $jariJari;

  public function __construct($jariJari) {
    $this->jariJari = $jariJari;
  }

  public function hitungLuas() {
    $luas = 4 * M_PI * pow($this->jariJari, 2);
    return $luas;
  }

  public function hitungVolume() {
    $volume = (4/3) * M_PI * pow($this->jariJari, 3);
    return $volume;
  }
}

// Form HTML untuk input jari-jari bola
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hitung Luas dan Volume Bola</title>
</head>
<body>
  <h1>Hitung Luas dan Volume Bola</h1>
  <form action="" method="post">
    <label for="jariJari">Jari-jari:</label>
    <input type="number" id="jariJari" name="jariJari" required>
    <br>
    <br>
    <button type="submit">Hitung</button>
  </form>

  <br>

HTML;

// Memproses data input dan menghitung luas dan volume bola
if (isset($_POST['jariJari'])) {
  $jariJari = $_POST['jariJari'];

  $bola = new Bola($jariJari);
  $luas = $bola->hitungLuas();
  $volume = $bola->hitungVolume();

  echo <<<RESULT
    <h2>Hasil Perhitungan</h2>
    <p>Jari-jari: $jariJari</p>
    <br>
    <p>Luas Permukaan: $luas</p>
    <p>Volume: $volume</p>
RESULT;
}

echo <<<HTML
</body>
</html>
HTML;
