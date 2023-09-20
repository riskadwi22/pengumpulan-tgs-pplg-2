     <?php
     $cuaca;
     $suhuCelsius;
     $fahrenheit;
     $suhuFahrenheit
     ?>
     
     <!DOCTYPE html>
        <html>
        <head>
            <title>Pengecekan Cuaca</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                }
                .container {
                    width: 300px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;

                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Pengecekan Cuaca</h2>
                <form method="post" action="">
                    <label for="suhu">Masukkan suhu dalam Fahrenheit:</label><br>
                    <input type="text" name="suhu" id="suhu" value="<?php echo $suhuFahrenheit; ?>"><br><br>
                    <button type="submit">Cek Cuaca</button>
                </form>
                <br>
                <?php if ($cuaca !== ""): ?>
                    <p>Cuaca saat ini: <?php echo $cuaca; ?></p>
                <?php endif; ?>
            </div>
        </body>
        </html>
<?php
// Fungsi untuk mengkonversi Fahrenheit ke Celsius
function fahrenheitToCelsius($fahrenheit) {
    return ($fahrenheit - 32) * 5/9;
}

// Inisialisasi variabel
$suhuFahrenheit = "";
$cuaca = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input suhu dalam Fahrenheit
    $suhuFahrenheit = floatval($_POST["suhu"]);
    
    // Konversi suhu ke Celsius
    $suhuCelsius = fahrenheitToCelsius($suhuFahrenheit);
    
    // Mengecek kondisi cuaca
    if ($suhuCelsius > 30) {
        $cuaca = "panas";
    } elseif ($suhuCelsius < 25) {
        $cuaca = "dingin";
    } else {
        $cuaca = "normal";
    }
}
?>

