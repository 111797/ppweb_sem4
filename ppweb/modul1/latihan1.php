<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="number" id="num1" name="num1" value="">
<input type="number" id="num2" name="num2" value="">
  = <input type="text" id="hasil" name="hasil" value="" readonly>
  <br>
  Operator
  <br>
  <input type="submit" name="operator" value="+">
  <input type="submit" name="operator" value="-">
  <input type="submit" name="operator" value="*">
  <input type="submit" name="operator" value="/">
  <input type="submit" name="operator" value="mod">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];

  switch ($operator) {
    case '+':
      $hasil = $num1 + $num2;
      break;
    case '-':
      $hasil = $num1 - $num2;
      break;
    case '*':
      $hasil = $num1 * $num2;
      break;
    case '/':
      $hasil = $num1 / $num2;
      break;
    case 'mod':
      $hasil = $num1 % $num2;
      break;
  }

  echo "<script>document.getElementById('hasil').value = '$hasil';</script>";
}
?>

<script>
// Menyimpan nilai input ke dalam localStorage
document.getElementById('num1').value = localStorage.getItem('num1');
document.getElementById('num2').value = localStorage.getItem('num2');

// Memperbarui nilai localStorage setiap kali nilai input berubah
document.getElementById('num1').oninput = function() {
  localStorage.setItem('num1', document.getElementById('num1').value);
}
document.getElementById('num2').oninput = function() {
  localStorage.setItem('num2', document.getElementById('num2').value);
}
</script>

</body>
</html>
