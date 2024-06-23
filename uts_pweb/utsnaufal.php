<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <style>
        /* Gaya CSS untuk tampilan kalkulator BMI */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #0078d4;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005a9e;
        }

        #result {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Kalkulator BMI</h1>
    <form id="bmi-form" method="post">
        <label for="birthdate">Tanggal Lahir:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <br>
        <label for="gender">Jenis Kelamin:</label>
        <select id="gender" name="gender">
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select>
        <br>
        <label for="height">Tinggi Badan (cm):</label>
        <input type="number" id="height" name="height" required>
        <br>
        <label for="weight">Berat Badan (kg):</label>
        <input type="number" id="weight" name="weight" required>
        <br>
        <input type="submit" name="submit" value="Hitung BMI">
    </form>

    <div id="result">
        <?php
        // Handle form submission and BMI calculation
        if(isset($_POST['submit'])) {
            $gender = $_POST['gender'];
            $height = floatval($_POST['height']);
            $weight = floatval($_POST['weight']);

            // Hitung BMI
            $bmi = $weight / (($height / 100) ** 2);

            // Tampilkan hasil
            echo "BMI Anda: " . number_format($bmi, 2);

            // Berikan kategori berdasarkan BMI
            if ($gender === "male") {
                if ($bmi <= 18.4) {
                    echo " (Kekurangan bobot)";
                } else if ($bmi <= 22.9) {
                    echo " (Normal)";
                } else if ($bmi <= 24.9) {
                    echo " (Kelebihan Bobot)";
                } else if ($bmi <= 29.9) {
                    echo " (Obesitas 1)";
                } else if ($bmi >= 30) {
                    echo " (Obesitas 2)";
                }
            } else if ($gender === "female") {
                if ($bmi <= 18.4) {
                    echo " (Kurus)";
                } else if ($bmi <= 22.9) {
                    echo " (Normal)";
                } else if ($bmi <= 24.9) {
                    echo " (Kelebihan Bobot)";
                } else if ($bmi <= 29.9) {
                    echo " (Obesitas 1)";
                } else if ($bmi >= 30) {
                    echo " (Obesitas 2)";
                }
            }
        }
        ?>
    </div>
</body>
</html>
