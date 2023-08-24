<!DOCTYPE html>
<html>
<head>
    <title>Analisis Bilangan Bulat</title>
    <style>
	Body  { 
		background-color:grey;  
	}
	p.text  { 
		font-size:20px;  
		color:white;  
	}
</style>
</head>
<body>
    <h1>Analisis Bilangan Bulat</h1>
    <form method="post" action="">
        <label for="bilangan">Masukkan bilangan bulat:</label>
        <input type="number" name="bilangan" required>
        <br>
        <input type="submit" value="Analisis">
    </form>
</body>
</html>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan = $_POST["bilangan"];

        // Memisahkan angka menjadi satuan, puluhan, dan ratusan
        $satuan = $bilangan % 10; /// menggunakan operator modulus (%) untuk mendapatkan sisa bagi dari bilangan yang dibagi dengan 10.//
        $puluhan = floor(($bilangan % 100) / 10);///menggunakan operator modulo lagi untuk mendapatkan sisa bagi dari bilangan yang dibagi dengan 100//
        $ratusan = floor(($bilangan % 1000)/100);//membagi bilangan dengan 100 untuk mendapatkan angka ratusannya//

        echo "<p>Angka satuan: $satuan</p>";
        echo "<p>Angka puluhan: $puluhan</p>";
        echo "<p>Angka ratusan: $ratusan</p>";
    }
    ?>
